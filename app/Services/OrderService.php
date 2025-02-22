<?php


namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OrderService
{
    /**
     * Fetch all orders for the authenticated user with caching.
     *
     * @return mixed
     */
    public function getOrders(): mixed
    {
        $userId = auth()->id();

        return Cache::remember("orders_user_{$userId}", now()->addMinutes(10), function () use ($userId) {
            return Order::forCurrentUser()->get();
        });
    }

    /**
     * Fetch a single order with caching.
     *
     * @param string $id
     * @return mixed
     */
    public function getOrder(string $id): mixed
    {
        return Cache::remember("order_{$id}", now()->addMinutes(10), function () use ($id) {
            return Order::findOrFail($id);
        });
    }



    /**
     * @param array $data
     * @return Order
     * @throws Exception
     */
    public function createOrder(array $data): Order
    {
        DB::beginTransaction();

        try {
            // Assign user id not passed through data variable
            $data['user_id'] = $data['user_id'] ?? auth()->user()->id;
            $data['status'] = 'placed';


            $order = Order::query()->create($data);

            DB::commit();
            return $order;

        } catch (Exception $e) {
            report($e);
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Update an order within a database transaction.
     *
     * @param array $data
     * @param string $id The ID of the order to update.
     * @return Order
     * @throws AuthorizationException
     */
    public function updateOrder(array $data, string $id): Order
    {
        DB::beginTransaction();

        try {
            $order = Order::query()->findOrFail($id);

            if (Gate::denies('update', $order)) {
                throw new AuthorizationException('Unauthorized action.');
            }

            $order->fill($data);

            $order->save();

            DB::commit();

            return $order;

        } catch (AuthorizationException|ModelNotFoundException $e) {
            DB::rollBack();
            throw $e;
        } catch (Exception $e) {
            report($e);
            DB::rollBack();
            throw new Exception('An error occurred while updating the order.');
        }
    }




    /**
     * Delete the ORder.
     *
     * @param string $id The ID of the order to delete.
     * @return void
     * @throws AuthorizationException
     * @throws ModelNotFoundException
     * @throws Exception
     */
    public function deleteOrder(string $id): void
    {
        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);

            if (Gate::denies('delete', $order)) {
                throw new AuthorizationException('Unauthorized action.');
            }

            $order->delete();

            DB::commit();

        } catch (AuthorizationException | ModelNotFoundException $e) {
            DB::rollBack();
            throw $e;
        } catch (\Exception $e) {
            report($e);

            DB::rollBack();
            throw new \Exception('An error occurred while deleting the order.');
        }
    }

}

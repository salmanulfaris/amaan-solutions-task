<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderCreateRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Services\OrderService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    /**
     * Display all current user's orders.
     */
    public function index() : JsonResponse
    {
        return  response()->json($this->orderService->getOrders());
    }

    /**
     * Store a newly created resource in storage.
     * @param OrderCreateRequest $request
     * @return JsonResponse
     */
    public function store(OrderCreateRequest $request): JsonResponse
    {
        try {

            $order = $this->orderService->createOrder($request->validated());

            return response()->json($order,201);

        } catch (AuthorizationException) {
            return response()->json(['error' => 'Unauthorized action.'], 401);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Order not found.'], 404);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage() . $exception->getFile() . $exception->getLine()], 500);
        }
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $order = $this->orderService->getOrder($id);
        $gate = Gate::inspect('view', $order);

        /**
         * Showing Not Found response while accessing other user's order
         */
        if ($gate->denied()) {
            throw new ModelNotFoundException("Order not found");
        }

        return response()->json($order);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param OrderUpdateRequest $request The request containing the update data.
     * @param string $id The ID of the order to update.
     * @return JsonResponse
     */
    public function update(OrderUpdateRequest $request, string $id): JsonResponse
    {

        try {
            $order = $this->orderService->updateOrder($request->validated(), $id);

            return response()->json($order);

        } catch (AuthorizationException) {
            return response()->json(['error' => 'Unauthorized action.'], 401);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Order not found.'], 404);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

    }


    /**
     * Delete the specified resource from storage.
     *
     * @param string $id The ID of the order to delete.
     * @return JsonResponse
     */
    public function destroy(string $id)
    {
        try {
            // Use the service to delete the order
            $this->orderService->deleteOrder($id);

            return response()->json([
                'message' => 'Order deleted successfully',
            ], 200);

        } catch (AuthorizationException) {

            return response()->json(['error' => 'Unauthorized action.'], 401);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Order not found.'], 404);
        } catch (\Exception $exception) {
            // Handle any other exceptions
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}

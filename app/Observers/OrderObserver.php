<?php

namespace App\Observers;

use App\Models\Order;
use App\Services\ActionLogService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Cache;

class OrderObserver
{
    private ActionLogService $actionLogService;

    public function __construct()
    {
        $this->actionLogService = new ActionLogService();
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $this->actionLogService->create("ORDER::CREATED::" . $order->getKey());
        Cache::forget("orders_user_{$order->user_id}");

    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $this->actionLogService->create("ORDER::UPDATED::" . $order->getKey());
        Cache::forget("order_{$order->id}");
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        $this->actionLogService->create("ORDER::DELETED::" . $order->getKey());
        Cache::forget("order_{$order->id}");
    }

}

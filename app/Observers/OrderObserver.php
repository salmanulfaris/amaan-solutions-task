<?php

namespace App\Observers;

use App\Models\Order;
use App\Services\ActionLogService;

class OrderObserver
{
    private $actionLogService;
    public function __construct()
    {
        $this->actionLogService =  new ActionLogService();
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        $this->actionLogService->create("ORDER::CREATED");
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $this->actionLogService->create("ORDER::UPDATED");
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        $this->actionLogService->create("ORDER::DELETE");
    }

}

<?php

namespace App\Services;

use App\Models\ActionLog;

class ActionLogService
{
    public function create(string $actionType): ActionLog
    {
        return ActionLog::query()->create([
            'action_type' => $actionType,
            'user_id' => auth()->user()->id
        ]);
    }
}

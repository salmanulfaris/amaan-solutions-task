<?php

namespace App\Enums;

use App\Interfaces\EnumInterface;
use App\Traits\HasEnum;

enum OderStatus: int implements EnumInterface
{
    use HasEnum;

    case CANCELLED = 0;
    case INITIATED = 1;
    case SHIPPED = 2;
    case DELIVERED = 3;


    /**
     * Get the descriptive label for OderStatus
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::CANCELLED => 'Cancelled',
            self::INITIATED => 'Initiated',
            self::SHIPPED => 'Shipped',
            self::DELIVERED => 'Delivered',
        };
    }


}

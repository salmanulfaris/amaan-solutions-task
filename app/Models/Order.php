<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_name',
        'amount',
        'status'
    ];

    protected static function boot(): void
    {
        /* Global model observer for create,update,delete events  */
        self::observe(OrderObserver::class);
    }


    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}

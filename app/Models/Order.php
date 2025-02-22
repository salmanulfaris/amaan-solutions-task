<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function Termwind\parse;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_name',
        'amount',
        'status'
    ];

    protected static function boot(): void
    {
        parent::boot();


        /* Global model observer for create,update,delete events  */
        self::observe(OrderObserver::class);
    }


    public function scopeforCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }


    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}

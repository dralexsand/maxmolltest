<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public const ORDER_STATUSES = ['active', 'completed', 'canceled'];
    public const ORDER_TYPES = ['online', 'offline'];

    protected $guarded = [];

    public $timestamps = false;


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getCreatedAtAttribute()
    {
        return date('Y-m-d H:i:s');
    }

    public function getCompletedAtAttribute()
    {
        return date('Y-m-d H:i:s');
    }

    public static function getOrderStatuses(): array
    {
        return self::ORDER_STATUSES;
    }

    public static function getOrderTypes(): array
    {
        return self::ORDER_TYPES;
    }
}

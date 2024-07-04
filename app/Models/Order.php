<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 'order_date', 'total_amount', 'price_id', 'total_harga'];

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($order) {
            $order->total_harga = $order->total_amount * $order->price->price;
        });
    }
}


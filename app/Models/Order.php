<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = ['customer_id', 'product_id','order_date', 'total_amount'];
}

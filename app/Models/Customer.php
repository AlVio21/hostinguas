<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'name', 'alamat', 'description', 'phone'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

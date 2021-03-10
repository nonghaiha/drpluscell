<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $table="order_detail";
    protected $fillable=['product_id','orders_id','quantity','price','status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table="orders";
    protected $fillable=['name','email','phone','address'];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product','order_detail','orders_id','product_id')->withPivot('quantity','price','status')->withTimestamps();
    }
    
}

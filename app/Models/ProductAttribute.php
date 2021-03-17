<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table="product_attribute";

    protected $fillable=['product_id','attribute_id','quantity'];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}

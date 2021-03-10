<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table="attribute";
    protected $fillable=['name','size','color'];
    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_attribute','product_id','attribute_id')->withPivot('quantity');
    }
}

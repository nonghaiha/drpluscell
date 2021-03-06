<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table="product";
    protected $fillable=['name','slug','price','sale','image','content','category_id','status'];
    public function attribute()
    {
        return $this->belongsToMany('App\Models\Attribute','product_attribute','product_id','attribute_id')->withPivot('quantity');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders','order_detail','orders_id','product_id')->withPivot('quantity','price','status')->withTimestamps();
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

}

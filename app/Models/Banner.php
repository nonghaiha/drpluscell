<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table="banner";
    protected $fillable=['name','status','link','image','content','location_content'];
}

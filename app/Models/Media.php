<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'product_id',
        'image',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [];
}

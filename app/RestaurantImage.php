<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    protected $fillable = [
        'filename',
        'mime',
        'original_filename',
        'restaurant_id',
    ];
}

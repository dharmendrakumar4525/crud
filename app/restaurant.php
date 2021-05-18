<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{

    protected $fillable = [
        'restaurant_name',
        'restaurant_code',
        'restaurant_desc',
        'restaurant_desc',
        'email',
        'user_id'
    ];
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantImageController extends Controller
{
    protected $fillable = [
        'filename',
        'mime',
        'original_filename',
        'restaurant_id',
    ];
}

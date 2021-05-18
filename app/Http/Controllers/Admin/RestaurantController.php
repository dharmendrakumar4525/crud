<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantStoreRequest;
use App\restaurant;
use App\RestaurantImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('admin.restaurant.create');
    }
    public function create( RestaurantStoreRequest $request)
    {

        $restaurant =  new restaurant();
        $restaurant->restaurant_name =$request->name;
        $restaurant->restaurant_code= $request->code;
        $restaurant->restaurant_desc=$request->Description;
        $restaurant->phone_number=$request->PhoneNumber;
        $restaurant->email=$request->Email;
        $restaurant->user_id= auth()->user()->id;
        $restaurant->save();

        $cover = $request->file('image');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        $restaurantImage = new RestaurantImage();
        $restaurantImage->mime = $cover->getClientMimeType();
        $restaurantImage->original_filename = $cover->getClientOriginalName();
        $restaurantImage->filename = $cover->getFilename().'.'.$extension;
        $restaurantImage->restaurant_id = $restaurant['id'];
        $restaurantImage->save();

        $restaurants =   auth()->user()->load('restaurants','restaurants.restaurantimage');
        $restaurants=  $restaurants->restaurants;
        return view('admin.restaurant.show',compact('restaurants'));

    }
    public function show()
    {
        $restaurants =   auth()->user()->load('restaurants','restaurants.restaurantimage');
        $restaurants=  $restaurants->restaurants;
        return view('admin.restaurant.show',compact('restaurants'));
    }

    public function deleted($id)
    {
        $restaurant=   restaurant::find($id);
        $restaurantimage= $restaurant->restaurantimage;
        $restaurantimage->delete();
        $restaurant->delete();
        $image_path = $restaurantimage['filename'];
        File::delete($image_path);
    }

    public function edit($id)
    {
        $restaurant=   restaurant::find($id);
        return view('admin.restaurant.edit',compact('restaurant'));
    }

    public function update($id)
    {
        $restaurant =   restaurant::find($id);
        deleted($id);
        create($id);
        $restaurants =   auth()->user()->load('restaurants','restaurants.restaurantimage');
        $restaurants=  $restaurants->restaurants;
        return view('admin.restaurant.show',compact('restaurants'));

    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantStoreRequest;
use App\restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('admin.restaurant.create');
    }
    public function update( RestaurantStoreRequest $request)
    {

        $restaurant =  new restaurant();
        $restaurant->restaurant_name =$request->name;
        $restaurant->restaurant_code= $request->code;
        $restaurant->restaurant_desc=$request->Description;
        $restaurant->phone_number=$request->PhoneNumber;
        $restaurant->email=$request->Email;
        $restaurant->user_id= auth()->user()->id;
        $restaurant->save();
        return view('admin.restaurant.create');

    }
    public function show()
    {
        $restaurants =   auth()->user()->restaurants->toArray();
        return view('admin.restaurant.show',compact('restaurants'));
    }

    public function deleted($id)
    {
        dd("de");
        $restaurants =   auth()->user()->restaurants->toArray();
        return view('admin.restaurant.show',compact('restaurants'));
    }
    public function edit($id)
    {
        dd("edit");
        $restaurants =   auth()->user()->restaurants->toArray();
        return view('admin.restaurant.show',compact('restaurants'));
    }



}

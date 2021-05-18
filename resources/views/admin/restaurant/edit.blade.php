
@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form  action="{{ route("admin.restaurant.create") }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Restaurant Name</label>
                                <input type="text" id="name" name="name" class="form-control" value={{ old('restaurant_name', isset($restaurant) ? $restaurant->restaurant_name : '') }}>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Restaurant Code</label>
                                <input type="text" id="code" name="Code" class="form-control" value={{ old('restaurant_code', isset($restaurant) ? $restaurant->restaurant_code : '') }}>
                                @if($errors->has('Code'))
                                    <p class="help-block">
                                        {{ $errors->first('Code') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Restaurant Desc</label>
                                <input type="text" id="desc" name="Description" class="form-control" value={{ old('restaurant_desc', isset($restaurant) ? $restaurant->restaurant_desc : '') }}>
                                @if($errors->has('Description'))
                                    <p class="help-block">
                                        {{ $errors->first('Description') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" id="email" name="Email" class="form-control" value={{ old('email', isset($restaurant) ? $restaurant->email : '') }}>
                                @if($errors->has('Email'))
                                    <p class="help-block">
                                        {{ $errors->first('Email') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                <input type="text" id="phone_num" name="PhoneNumber" class="form-control" value={{ old('phone_number', isset($restaurant) ? $restaurant->phone_number : '') }}>
                                @if($errors->has('PhoneNumber'))
                                    <p class="help-block">
                                        {{ $errors->first('PhoneNumber') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image"  name= "image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

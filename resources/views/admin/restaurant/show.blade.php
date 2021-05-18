@extends('layouts.admin')
@section('content')
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Restaurant Name</th>
        <th scope="col">Restaurant Code</th>
        <th scope="col">Restaurant Desc</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Mobile</th>
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    @foreach(  $restaurants as $restaurant )

    <tr>
        <td>{{$restaurant['restaurant_name']}}</td>
        <td>{{$restaurant['restaurant_code']}}</td>
        <td>{{$restaurant['restaurant_desc']}}</td>
        <td>{{$restaurant['email']}}</td>
        <td>{{$restaurant['phone_number']}}</td>
        <td> <a herf="{{route('admin.restaurant.edit',$restaurant['id'])}}"> <button>edit</button></a></td>

    </tr>
    @endforeach
    </tbody>
</table>
@endsection

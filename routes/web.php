<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/restaurant', 'RestaurantController@index')->name('home');

    Route::post('restaurant/update','RestaurantController@update')->name('restaurant.update');
    Route::get('restaurant/show','RestaurantController@show');
    Route::get('restaurant/show/{id}','RestaurantController@deleted')->name('restaurant.delete');
    Route::get('restaurant/show/{id}','RestaurantController@edit')->name('restaurant.edit');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');
});

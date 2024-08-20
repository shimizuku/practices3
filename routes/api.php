<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:api')->group(function() {
    Route::get('auth/users/create', 'App\Http\Controllers\Auth\UsersController@create');
    Route::post('auth/users/create', 'App\Http\Controllers\Auth\UsersController@create');
    Route::post('auth/users/createpost', 'App\Http\Controllers\Auth\UsersController@createPost');
    Route::get('auth/users/edit', 'App\Http\Controllers\Auth\UsersController@edit');
    Route::post('auth/users/edit', 'App\Http\Controllers\Auth\UsersController@edit');
    Route::post('auth/users/editpost', 'App\Http\Controllers\Auth\UsersController@editPost');
});

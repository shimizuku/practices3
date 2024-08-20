<?php

use Illuminate\Support\Facades\Route;
use App\Consts\RouteConst;

// トップページ
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/contents', function () {
    return view('index');
})->name('contents');

//Auth関連
// Auth::routes();
Route::get('auth/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('auth/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('auth/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::get('auth/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('auth/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('auth/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('auth/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/auth', function () {
    return view('auth/home');
})->middleware(['auth'])->name('auth');

//管理画面メニュー
Route::get('auth/contents/list', 'App\Http\Controllers\Auth\ContentsController@list')->middleware(['auth'])->name('contentsList');
Route::post('auth/users/list', 'App\Http\Controllers\Auth\UsersController@list')->middleware(['auth'])->name('usersList');
Route::get('auth/users/create', 'App\Http\Controllers\Auth\UsersController@create')->middleware(['auth'])->name('usersCreate');
Route::post('auth/users/create', 'App\Http\Controllers\Auth\UsersController@create')->middleware(['auth'])->name('usersCreate');
Route::post('auth/users/createpost', 'App\Http\Controllers\Auth\UsersController@createPost')->middleware(['auth'])->name('usersCreatePost');
Route::get('auth/users/edit', 'App\Http\Controllers\Auth\UsersController@edit')->middleware(['auth'])->name('usersEdit');
Route::post('auth/users/edit', 'App\Http\Controllers\Auth\UsersController@edit')->middleware(['auth'])->name('usersEdit');
Route::post('auth/users/editpost', 'App\Http\Controllers\Auth\UsersController@editPost')->middleware(['auth'])->name('usersEditPost');

// 問い合わせページ
Route::get( '/contact',         'App\Http\Controllers\ContactsController@show'    )->name('contact.show');
Route::post('/contact',         'App\Http\Controllers\ContactsController@post'    )->name('contact.post');
Route::get( '/contact/confirm', 'App\Http\Controllers\ContactsController@confirm' )->name('contact.confirm');
Route::post('/contact/confirm', 'App\Http\Controllers\ContactsController@send'    )->name('contact.send');
Route::get( '/contact/done',    'App\Http\Controllers\ContactsController@done'    )->name('contact.done');

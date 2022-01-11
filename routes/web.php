<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile' , 'ProfileController@index')->name('profile.index');
Route::put('profile/update' , 'ProfileController@update')->name('profile.update');

// Route For Post
Route::resource('posts', 'PostController');
Route::get('trashed/' , 'PostController@postsTrashed')->name('posts.trashed');
Route::get('posts/softDelete/{id}' , 'PostController@softDelete')->name('posts.softDelete');
Route::get('posts/hdelete/{id}' , 'PostController@hdelete')->name('posts.hdelete');
Route::get('posts/restore/{id}' , 'PostController@restore')->name('posts.restore');

// Route For Tag
Route::get('tags', 'TagController@index')->name('tags.index');
Route::get('tags/create/', 'TagController@create')->name('tags.create');
Route::post('tags/store', 'TagController@store')->name('tags.store');
Route::get('tags/{id}/edit', 'TagController@edit')->name('tags.edit');
Route::PUT('tags/{id}/update', 'TagController@update')->name('tags.update');
Route::delete('tags/{id}', 'TagController@destroy')->name('tags.destroy');


// Route For User
Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/create/', 'UserController@create')->name('users.create');
Route::post('users/store', 'UserController@store')->name('users.store');
Route::get('users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/explore', function () {
    return view('explore');
});

Route::get('/mybucketlist', function () {
    return view('mybucketlist');
});

/*Route is mapped to the '/register' URI and will return the home page where register form is located */
Route::get('/register', function() {
    return view('home');
});

/*Fetches the post parameters of registration*/
Route::post('/register', 'App\Http\Controllers\RegisterController@index');

/*Route is mapped to the '/login' URI and will return the home page where login form is located */
Route::get('/login', function() {
    return view('home');
});

/*Fetches the post parameters of login*/
Route::post('/login', 'App\Http\Controllers\LoginController@index');

/*Fetches the post parameters of logout*/
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

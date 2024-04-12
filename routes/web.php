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

Route::get('/pzn', fn () => "Hello Programmer Zaman Now");

Route::redirect('/youtube', '/pzn');

Route::fallback(fn () => view('errors.404'));

// Route::view('/hello', 'hello', ['name' => 'Falentino Djoka']);
Route::get('/hello', fn () => view('hello', ['name' => 'Tino Oasis']));
Route::get('/hello-world', fn () => view('hello.world', ['name' => 'Tino Oasis part II']));
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

Route::get('/products/{id}', function($idProduct){
    return "Product $idProduct";
})->name('product.detail');

Route::get('/products/{product}/items/{items}', function($productId, $itemId){
    return  "Product $productId, Items $itemId";
});

Route::get('/category/{id}', function($idKategori){
    return 'Category '.$idKategori;
})->where('id', '[0-9]+');

Route::get('/produk/{id}', function($id){
    $link   =   route('product.detail', ['id' => $id]);
    return $link;
});

Route::get('/produk-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});
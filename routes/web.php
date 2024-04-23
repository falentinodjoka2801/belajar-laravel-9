<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\RedirectController;
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

Route::get('/controller/hello/request', [HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);

Route::post('/file/upload', [FileController::class, 'upload']);

#Mahasiswa
Route::get('/mahasiswa/add', [Mahasiswa::class, 'add']);
Route::post('/mahasiswa/save', [Mahasiswa::class, 'save'])->name('mahasiswa.save');

Route::prefix('ajax')->namespace('App\Http\Controllers')->group(function(){
    Route::get('konsentrasi-prodi/{kodeProdi}', 'AJAX@konsentrasiProdi');
});

Route::get('/cookie/set', [CookieController::class, 'createCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);

Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);
Route::get('/redirect/name', [RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])->name('redirect-hello');

Route::get('/middleware/api', function(){
    return 'OK';
})->middleware(['contoh']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/product/detail/{id}', [ProductController::class, 'detail']);
// Route::get('/product', 'App\Http\Controllers\ProductController@index');
// Route::view('/product', 'product');
Route::post('/saveProduct', [ProductController::class, 'postProduk']);
Route::get('/listProduct', [ProductController::class, 'listProduk']);
Route::get('/detailProduct/{id}', [ProductController::class, 'detailProduk']);
Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduk']);
Route::get('/getTokenCsrf', function() {
    echo csrf_token(); 
});





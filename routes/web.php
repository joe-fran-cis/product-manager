<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::resource('products', ProductController::class);
Route::resource('product-variants', ProductVariantController::class);
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/', [ProductController::class, 'index'])->name('products.index');
//Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.index');
Route::get('/products', [ProductController::class, 'show'])->name('products.index');

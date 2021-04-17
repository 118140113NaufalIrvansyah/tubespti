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
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\BrandsController;
use \App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function() {
Route::get('/', 'DashboardController@index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Kategori Barang
Route::resource('categories', CategoriesController::class);

//Brand atau Tipe 
Route::resource('brands', BrandsController::class);

// Product
Route::resource('products', ProductsController::class);
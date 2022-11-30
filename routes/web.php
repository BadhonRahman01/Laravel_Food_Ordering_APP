<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeatprodController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;
//use App\Http\Controllers\FeaturedProductController;

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
    return view('welcome2');
});
Route::get('/categories', function () {
    return view('index');
});
Route::get('/banners', function () {
    return view('index');
});
Route::get('/services', function () {
    return view('index');
});
// Route::get('/users', function () {
//     return view('index');
// });

// Route::resources([
//     '/categories'  => CategoryController::class
// ]);

Route::resource('categories', 'App\Http\Controllers\CategoryController');
//Route::get('/categories', [CategoryController::class, 'index']);
//Route::resource('categories', CategoryController::class);
//Route::get('/categories.index', 'CategoryController@index')->name('categories.index');
//Route::get('/categories', [CategoryController::class, 'index']);
//Route::get('/categories/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('index');

Route::resource('banners', 'App\Http\Controllers\BannerController');

Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('services', 'App\Http\Controllers\ServiceController');

Route::resource('menus', 'App\Http\Controllers\MenuController');

Route::resource('products', 'App\Http\Controllers\ProductController');
//Route::resource('featured_products', 'App\Http\Controllers\FeaturedProductController');

Route::resource('featprods', 'App\Http\Controllers\FeatprodController');

Route::resource('stores', 'App\Http\Controllers\StoreController');

Route::resource('orders', 'App\Http\Controllers\OrderController');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource([
//     '/categories' => 'App\Http\Controllers\API\CategoryController',
//     '/banners' => 'App\Http\Controllers\API\BannerController',
//     '/featprods' => 'App\Http\Controllers\API\FeatprodController',
//     '/menus' => 'App\Http\Controllers\API\MenuController',
//     '/orders' => 'App\Http\Controllers\API\OrderController',
//     '/products' => 'App\Http\Controllers\API\ProductController',
//     '/services' => 'App\Http\Controllers\API\ServiceController',
//     '/stores' => 'App\Http\Controllers\API\StoreController',
//     '/users' => 'App\Http\Controllers\API\UserController',

// ]);
//Route::group(['middleware' => ['can:Access home']], function () {


Route::apiResource('banners', 'App\Http\Controllers\API\BannerController');
Route::apiResource('categories', 'App\Http\Controllers\API\CategoryController');
Route::apiResource('featprods', 'App\Http\Controllers\API\FeatprodController');
Route::apiResource('menus', 'App\Http\Controllers\API\MenuController');  
Route::apiResource('orders', 'App\Http\Controllers\API\OrderController');
Route::apiResource('products', 'App\Http\Controllers\API\ProductController');
Route::apiResource('services', 'App\Http\Controllers\API\ServiceController');
Route::apiResource('stores', 'App\Http\Controllers\API\StoreController');
Route::apiResource('users', 'App\Http\Controllers\API\UserController');
Route::apiResource('dashboard', 'App\Http\Controllers\API\HomeController');

Route::get('index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// });
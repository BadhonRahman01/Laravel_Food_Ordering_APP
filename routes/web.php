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


// Route::get('/', function () {
//     return view('welcome2');
// });
Route::get('login', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/welcome2', function () {
    //$banner = Http::get('http://localhost:8000/api/banners/')->json();
    return view('welcome2');
});

////////////////
Route::get('/categories', function () {
    return view('index');
});
Route::get('/banners', function () {
    return view('index');
});
Route::get('/services', function () {
    return view('index');
});
Route::get('/users', function () {
    return view('index');
});
Route::get('/stores', function () {
    return view('index');
});
Route::get('/products', function () {
    return view('index');
});
Route::get('/orders', function () {
    return view('index');
});
Route::get('/menus', function () {
    return view('index');
});
Route::get('/featprods', function () {
    return view('index');
});
// Route::get('/users', function () {
//     return view('index');
// });

// Route::resources([
//     '/categories'  => CategoryController::class
// ]);



Route::resource('categories', 'App\Http\Controllers\CategoryController')->middleware('auth');
//Route::get('/categories', [CategoryController::class, 'index']);
//Route::resource('categories', CategoryController::class);
//Route::get('/categories.index', 'CategoryController@index')->name('categories.index');
//Route::get('/categories', [CategoryController::class, 'index']);
//Route::get('/categories/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('index');

Route::resource('banners', 'App\Http\Controllers\BannerController')->middleware('auth');

Route::resource('users', 'App\Http\Controllers\UserController')->middleware('auth');
Route::resource('services', 'App\Http\Controllers\ServiceController')->middleware('auth');

Route::resource('menus', 'App\Http\Controllers\MenuController')->middleware('auth');

Route::resource('products', 'App\Http\Controllers\ProductController')->middleware('auth');
//Route::resource('featured_products', 'App\Http\Controllers\FeaturedProductController');

Route::resource('featprods', 'App\Http\Controllers\FeatprodController')->middleware('auth');

Route::resource('stores', 'App\Http\Controllers\StoreController')->middleware('auth');

Route::resource('orders', 'App\Http\Controllers\OrderController')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


// Route::get('welcome2', function () {
//     // $banners = "http://localhost:8000/api/banners/";
//     // $json = json_decode(file_get_contents($banners), true);
//     // $ban = request('GET','http://localhost:8000/api/banners/');
//     // $parsed_json = json_decode($banners, true);
//     // $id = $parsed_json->{'data'}->{'id'};
//     $url = 'http://localhost:8000/api/banners/';

//     $response = file_get_contents($url);
//     $newsData = json_decode($response);
//     dd($newsData);

//     //return response()->json($newsData);  

    
//    // return view('welcome2');
// });

// Route::middleware('auth')->group(funtion() {
// paste the routes without the middleware authentication
// });
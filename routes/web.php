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
use App\Http\Controllers\CartController;
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
    return view('home2');
});
Route::get('/welcome2', function () {
    return view('welcome2');
});
Route::get('/home2', function () {
    return view('home2');
});

Route::get('/product', function () {
    return view('product');
})->name('product');

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


// Route::get('products', [ProductController::class, 'products.Chicken'])->name('products.Chicken');
// Route::get('products', [ProductController::class, 'products.Burger'])->name('products.Burger');
// Route::get('products', [ProductController::class, 'products.Sandwich'])->name('products.Sandwich');
// Route::get('products', [ProductController::class, 'products.Snacks'])->name('products.Snacks');
// Route::get('products', [ProductController::class, 'products.Delivery'])->name('products.Delivery');
// Route::get('products', [ProductController::class, 'products.Dips'])->name('products.Dips');
Route::post('products', [ProductController::class, 'products.header'])->name('products.header');
/////////cart routes
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');



// Route::get('/', function () {
//     return view('welcome',[
//         'users' => App\Models\User::all()
//     ]);
// });
// Route::get('/product', function () {
//     return view('product',[
//                 'datas' => App\Models\Category::all(),
//                 'prods' => App\Models\Product::all()
//             ]);
//         });
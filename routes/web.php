<?php

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

use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/', 'HomeController@index')->name('homepage');


Route::get('/produk/{id}','ProdukController@show');
Route::get('/produk','ProdukController@index')->name('produklist');
Route::resource('review', 'ReviewController');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', 'CartController@index');
Route::get('/cart/add', 'CartController@create');
Route::any('/cart/detail', 'CartController@detail')->name('cart.detail');
Route::post('/cart/store', 'CartController@store');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::get('/cart/{id}/edit', 'CartController@edit');
Route::post('/cart/update', 'CartController@update');
Route::get('/cart/checkout', 'CartController@checkout');
Route::post('/cart/confirm', 'CartController@confirm');
Route::get('/cart/{id}', 'CartController@save');
});



Auth::routes();
Route::get('/profile/{user_id}', 'ProfileController@show');
Route::get('/profile/{user_id}/edit', 'ProfileController@edit');
Route::put('/profile/{user_id}', 'ProfileController@update');


Route::group(['middleware' => ['is_admin']], function () {
   
    Route::get('/order', 'OrderController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::post('/dashboard', 'DashboardController@store');
    Route::get('/dashboard/create', 'DashboardController@create');
  
    Route::patch('/dashboard/{dashboard}', 'DashboardController@update');
    Route::get('/dashboard/{dashboard}', 'DashboardController@show');
    Route::get('/dashboard/{dashboard}/edit', 'DashboardController@edit');
    Route::delete('/dashboard/{dashboard}', 'DashboardController@destroy');
    Route::resource('kategori', 'KategoriController');

});

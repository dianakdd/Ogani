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

Route::get('/', 'HomeController@index');



Auth::routes();
Route::get('/profile/{user_id}', 'ProfileController@show');
Route::get('/profile/{user_id}/edit', 'ProfileController@edit');
Route::put('/profile/{user_id}', 'ProfileController@update');


Route::group(['middleware' => ['is_admin']], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('kategori', 'KategoriController');
});

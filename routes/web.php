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

Route::get('/', function () {
    return view('pages.index');
});



Auth::routes();
Route::get('/profile/{user_id}','ProfileController@show');
Route::get('/profile/{user_id}/edit','ProfileController@edit');
Route::put('/profile/{user_id}','ProfileController@update');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/admin','DashboardController@index')->name('admin');
    Route::get('/admin/order','DashboardController@sales');
    Route::get('/admin/create', function () {
        return view('pages.dashboard.create');
    });
    Route::get('/admin/member','DashboardController@member');
    
});

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
    return view('welcome');
});

Route::get('/admin', 'AdminController@index' );
Route::post('/admin/login', 'AdminController@login' )->name('admin-login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {	
    Route::get('/admin/dashboard', 'AdminController@dashboard' )->name('admin-dashboard');
    app('router')->get('/admin/users', 'AdminController@users')->name('admin-users');
    //Route::get('/admin/users', 'AdminController@users' )->name('admin-users');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin-logout');
});

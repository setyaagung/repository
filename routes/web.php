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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/handle/{id}/{tanggal}', 'WelcomeController@detail')->name('detail');
Route::get('/editions/{id}', 'WelcomeController@edisi')->name('edisi');

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('author', 'AuthorController');
    //edisi
    Route::resource('edisi', 'EdisiController');
    Route::resource('jurnal', 'JurnalController');
    //user
    Route::resource('user', 'UserController');
    Route::get('/update-status/{id}', 'UserController@update_status');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});

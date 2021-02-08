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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('dokter','DokterController');
    Route::resource('pasien','PasienController');
    Route::resource('rekamMedis','RekamMedisController');
    Route::resource('obat','ObatController');
    Route::resource('kartuKes','KartuKesehatanController');
    Route::resource('ruang','RuangController');
    Route::post('/obat/input','ObatController@store')->name('obat.store');
    Route::post('/users/input', 'UserController@store')->name('users.store');
    Route::get('/users/delete/{id}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::put('/users/update/{id}','UserController@update')->name('users.update');
});

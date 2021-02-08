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
Route::get('/', 'HomeController@index')->name('home.index');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('dokter','DokterController');
    Route::resource('pasien','PasienController');
    Route::resource('rekamMedis','RekamMedisController');
    Route::resource('obat','ObatController');
    Route::resource('kartuKes','KartuKesehatanController');
    Route::resource('ruang','RuangController');

    // Home Controller
    // Route::get('/', 'UserController@edit')->name('users.edit');
    
    // Users management
    Route::post('/users/input', 'UserController@store')->name('users.store');
    Route::get('/users/delete/{id}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::put('/users/update/{id}','UserController@update')->name('users.update');

    // Obat management
    Route::post('/obat/input','ObatController@store')->name('obat.store');
    Route::get('/obat/delete/{id}', 'ObatController@destroy')->name('obat.destroy');
    Route::get('/obat/edit/{id}', 'ObatController@edit')->name('obat.edit');
    Route::put('/obat/update/{id}','ObatController@update')->name('obat.update');

    // Ruang management
    Route::post('/ruang/input','RuangController@store')->name('ruang.store');
    Route::get('/ruang/delete/{id}', 'RuangController@destroy')->name('ruang.destroy');
    Route::get('/ruang/edit/{id}', 'RuangController@edit')->name('ruang.edit');
    Route::put('/ruang/update/{id}','RuangController@update')->name('ruang.update');

    // kartuKes management
    Route::post('/kartuKes/input','KartuKesehatanController@store')->name('kartuKes.store');
    Route::get('/kartuKes/delete/{id}', 'KartuKesehatanController@destroy')->name('kartuKes.destroy');
    Route::get('/kartuKes/edit/{id}', 'KartuKesehatanController@edit')->name('kartuKes.edit');
    Route::put('/kartuKes/update/{id}','KartuKesehatanController@update')->name('kartuKes.update');

    // pasien management
    Route::get('/pasien/show/{id}','PasienController@show')->name('pasien.show');
    Route::post('/pasien/input','PasienController@store')->name('pasien.store');
    Route::get('/pasien/delete/{id}', 'PasienController@destroy')->name('pasien.destroy');
    Route::get('/pasien/edit/{id}', 'PasienController@edit')->name('pasien.edit');
    Route::put('/pasien/update/{id}','PasienController@update')->name('pasien.update');

    // rekamMedis management
    Route::get('/rekamMedis/show/{id}','RekamMedisController@show')->name('rekamMedis.show');
    Route::post('/rekamMedis/input','RekamMedisController@store')->name('rekamMedis.store');
    Route::get('/rekamMedis/delete/{id}', 'RekamMedisController@destroy')->name('rekamMedis.destroy');
    Route::get('/rekamMedis/edit/{id}', 'RekamMedisController@edit')->name('rekamMedis.edit');
    Route::put('/rekamMedis/update/{id}','RekamMedisController@update')->name('rekamMedis.update');

    // dokter management
    Route::get('/dokter/show/{id}','DokterController@show')->name('dokter.show');
    Route::post('/dokter/input','DokterController@store')->name('dokter.store');
    Route::get('/dokter/delete/{id}', 'DokterController@destroy')->name('dokter.destroy');
    Route::get('/dokter/edit/{id}', 'DokterController@edit')->name('dokter.edit');
    Route::put('/dokter/update/{id}','DokterController@update')->name('dokter.update');
});

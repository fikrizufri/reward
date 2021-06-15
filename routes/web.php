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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    //ACL -- Access Control List
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('task', 'TaskController');

    //Alat Kelengkapan
    Route::resource('badan', 'BadanController');
    Route::resource('fraksi', 'FraksiController');
    Route::resource('komisi', 'KomisiController');

    //Master Data
    Route::resource('jabatan', 'JabatanController');
    Route::resource('tempat', 'TempatController');
    Route::resource('jenis-rapat', 'JenisRapatController');
    Route::resource('masa-sidang', 'MasaSidangController');
    Route::resource('sifat-rapat', 'SifatRapatController');
    Route::resource('anggota', 'AnggotaController');
    Route::get('anggotadetail', 'AnggotaController@detail')->name('anggota.detail');
    Route::resource('pegawai', 'PegawaiController');
    Route::get('pegawaidetail', 'PegawaiController@detail')->name('pegawai.detail');

    Route::resource('tamu', 'TamuController');

    Route::resource('rapat', 'RapatController');
    Route::get('rapat/absen/{id}', 'RapatController@absen')->name('rapat.absen');
    Route::put('rapat/absen/{id}', 'RapatController@absenpost')->name('rapat.absen.pots');

    Route::get('rapat/notulen/{id}', 'RapatController@notulen')->name('rapat.notulen');
    Route::put('rapat/notulen/{id}', 'RapatController@notulenpost')->name('rapat.notulen.post');


    Route::get('anggotadummy', 'AnggotaController@dummy')->name('anggotadummy');

    Route::get('/ubahuser', 'UserController@ubah')->name('user.ubah');
    Route::put('/simpanuser', 'UserController@simpan')->name('user.simpan');

    Route::get('/excelrapat', 'RapatController@excel')->name('rapat.excel');
    Route::get('/excelabsen', 'RapatController@excelabsen')->name('absen.excel');
});

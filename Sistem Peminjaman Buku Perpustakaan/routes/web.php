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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => ['web']], function() {
    Route::resource('admin/', 'AdminController');
    Route::resource('admin/buku', 'BukuController');
    Route::post('admin/buku/autorak', 'BukuController@getRak')->name('autorak');
    Route::post('admin/buku/autopenulis', 'BukuController@getPenulis')->name('autopenulis');
    Route::post('admin/buku/autokategori', 'BukuController@getKategori')->name('autokategori');
    Route::post('admin/buku/autopenerbit', 'BukuController@getPenerbit')->name('autopenerbit');
    Route::resource('admin/kategori', 'KategoriController');
    Route::resource('admin/penerbit', 'PenerbitController');
    Route::resource('admin/penulis', 'PenulisController');
    Route::resource('admin/rak', 'RakController');

    Route::resource('admin/anggota', 'AnggotaController');
    Route::resource('admin/petugas', 'PetugasController');
    Route::resource('admin/peminjaman', 'PeminjamanController');
    Route::post('admin/peminjaman/autobuku', 'PeminjamanController@getBuku')->name('autobuku');
    Route::post('admin/peminjaman/autoanggota', 'PeminjamanController@getAnggota')->name('autoanggota');
    Route::post('admin/pengembalian/buku', 'PengembalianController@getKode');
    Route::patch('admin/pengembalian/kembali/{id}', 'PengembalianController@kembali');
    Route::resource('admin/pengembalian', 'PengembalianController');
    Route::resource('admin/pengaturan', 'PengaturanController');
});


Route::get('/home', 'HomeController@index')->name('home');

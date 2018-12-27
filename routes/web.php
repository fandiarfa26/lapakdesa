<?php

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'p_admin', 'middleware' => ['auth','is_admin']], function (){
    Route::get('/', function(){ 
        return redirect('/p_admin/dashboard'); 
    });
    Route::get('/dashboard', 'HomeController@index'); 
    Route::get('/lapak', 'UsahaController@index'); 
    Route::get('/lapak/{id}', 'UsahaController@show'); 
    Route::patch('/lapak/{id}', 'UsahaController@update');
    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/transaksi/{id}', 'TransaksiController@show');
    Route::patch('/transaksi/{id}/bayar', 'TransaksiController@bayar');
    Route::patch('/transaksi/{id}/kirim/{status}', 'TransaksiController@kirim');
});

Route::group(['namespace' => 'Usaha', 'prefix' => 'p_usaha', 'middleware' => ['auth','is_usaha']], function (){
    Route::get('/', function(){ 
        return redirect('/p_usaha/dashboard'); 
    }); 
    Route::get('/dashboard', 'HomeController@index');
    Route::get('/profil', 'UsahaController@show');
    Route::get('/profil/edit', 'UsahaController@edit');
    Route::patch('/profil', 'UsahaController@update');
    Route::get('/produk', 'ProdukController@index');
    Route::post('/produk', 'ProdukController@store');
    Route::get('/produk/form', 'ProdukController@create');
    Route::get('/produk/{id}', 'ProdukController@show');
    Route::get('/produk/{id}/edit', 'ProdukController@edit');
    Route::patch('/produk/{id}', 'ProdukController@update');
    Route::delete('/produk/{id}', 'ProdukController@destroy');
    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/transaksi/{id}', 'TransaksiController@show');
});

Route::get('/home', function() {
    if (Auth::user()->role == 2) {
        return redirect('/p_admin/dashboard');
    }else if (Auth::user()->role == 3) {
        return redirect('/p_usaha/dashboard');
    }else{
        return redirect('/');
    }
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/transaksi', 'TransaksiController@index');
    Route::post('/transaksi', 'TransaksiController@store');
    Route::get('/transaksi/{id}', 'TransaksiController@show');
    Route::get('/profil', 'UserController@show');
    Route::patch('/profil', 'UserController@update');
    Route::get('/produk/{id}/beli', 'ProdukController@cart');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/lapak', 'UsahaController@index');
Route::get('/lapak/{username}', 'UsahaController@show');
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/{id}', 'ProdukController@show');
Route::get('/cari/{keyword}', 'HomeController@cari');
Route::post('/cari', 'HomeController@postCari');
Route::get('/about', 'HomeController@about');
Route::post('/cart/{id}', 'ProdukController@addCart');
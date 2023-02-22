<?php

use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+');
Route::pattern('uuid', '[0-9a-fA-F]+');

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
    echo 'Selamat Datang';
});
Route::get('/about', function () {
    echo 'NIM : 2141720025 <br> Nama : Agus Prayogi';
});
Route::get('/articles/{id}', function ($id) {
    echo 'Halaman artikel dengan ID ' . $id;
});

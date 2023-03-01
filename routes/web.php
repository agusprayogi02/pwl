<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProgramController;

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

Route::get('/', [PageController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', [CategoryController::class, 'eduGames']);
    Route::get('/marbel-and-friends-kids-games', [CategoryController::class, 'friendsGames']);
    Route::get('/riri-story-books', [CategoryController::class, 'storyBooks']);
    Route::get('/kolak-kids-songs', [CategoryController::class, 'kidsSongs']);
});
Route::get('/news/{news?}', [PageController::class, 'news']);
Route::prefix('program')->group(function () {
    Route::get('/karir', [ProgramController::class, 'karir']);
    Route::get('/magang', [ProgramController::class, 'magang']);
    Route::get('/kunjungan-industri', [ProgramController::class, 'kunjunganIndustri']);
});

Route::get('/about-us', [PageController::class, 'about']);
Route::resource('/contact-us', ContactUsController::class)->only([
    'index', 'store'
]);

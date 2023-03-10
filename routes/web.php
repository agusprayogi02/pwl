<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HobiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/profile/{nama}', [ProfileController::class, 'index'])->name('profile');
Route::get('/kuliah', [KuliahController::class, 'index'])->name('kuliah');

Route::get('/articles', [ArtikelController::class, 'index'])->name('articles');
Route::get('/hobi', [HobiController::class, 'index'])->name('hobi');
Route::get('/keluarga', [FamilyController::class, 'index'])->name('keluarga');
Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul');


// Route::get('/', [PageController::class, 'index']);

// Route::prefix('product')->group(function () {
//     Route::get('/', [ProductController::class, 'index']);
// });

// Route::get('/news/{news?}', [PageController::class, 'news']);

// Route::prefix('program')->group(function () {
//     Route::get('/', 'PageController@program');
// });

// Route::get('/about-us', [PageController::class, 'aboutUs']);

// Route::resource('/contact-us', PageController::class)->only([
//     'contactUs'
// ]);

// Route::prefix('category')->group(function () {
//     Route::get('/marbel-edu-games', [CategoryController::class, 'eduGames']);
//     Route::get('/marbel-and-friends-kids-games', [CategoryController::class, 'friendsGames']);
//     Route::get('/riri-story-books', [CategoryController::class, 'storyBooks']);
//     Route::get('/kolak-kids-songs', [CategoryController::class, 'kidsSongs']);
// });
// Route::get('/news/{news?}', [PageController::class, 'news']);
// Route::prefix('program')->group(function () {
//     Route::get('/karir', [ProgramController::class, 'karir']);
//     Route::get('/magang', [ProgramController::class, 'magang']);
//     Route::get('/kunjungan-industri', [ProgramController::class, 'kunjunganIndustri']);
// });

// Route::get('/about-us', [PageController::class, 'about']);
// Route::resource('/contact-us', ContactUsController::class)->only([
//     'index', 'store'
// ]);

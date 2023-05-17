<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HobiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMataKuliahController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
// Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [DashboardController::class, 'index'])->name('home');
  Route::get('/profile/{nama}', [ProfileController::class, 'index'])->name('profile');
  Route::get('/kuliah', [KuliahController::class, 'index'])->name('kuliah');

  Route::get('/articles/cetak_pdf', [ArticleController::class, 'cetak_pdf'])->name('articles.cetak_pdf');
  Route::resource('/articles', ArticleController::class)->names('articles');
  Route::resource('/hobi', HobiController::class)->name('index', 'hobi');
  Route::resource('/keluarga', FamilyController::class)->names('keluarga');
  Route::resource('/matkul', MatkulController::class)->names('matkul');
  Route::resource('/mahasiswa', MahasiswaController::class)->names('mahasiswa');
  Route::get('/mahasiswa/nilai/{nim}', [MahasiswaController::class, 'nilai'])->name('mahasiswa_matakuliah.nilai');
  Route::get('/mahasiswa/nilai/show/{nim}', [MahasiswaController::class, 'show_nilai'])->name('mahasiswa_matakuliah.show');
  Route::post('/mahasiswa/nilai/create/{nim}', [MahasiswaController::class, 'create_nilai'])->name('mahasiswa_matakuliah.create');
});

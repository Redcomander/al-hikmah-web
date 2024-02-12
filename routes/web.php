<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Livewire\GalleryCreate;
use App\Livewire\GalleryEdit;
use App\Livewire\GalleryIndex;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pendaftarandepan', function () {
    return view('pendaftarandepan');
})->name('pendaftarandepan');

Route::get('/verification', function () {
    return view('verification');
})->name('verification');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/category/{category}', 'App\Http\Controllers\ArticleController@showByCategory')->name('showByCategory');
Route::get('/articles', 'App\Http\Controllers\ArticleController@showAll')->name('showAll');
Route::resource('article', ArticleController::class);

Route::get('/', [ViewController::class, 'welcome'])->name('welcome');

Route::resource('student', StudentController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('kategori', KategoriController::class);

Route::get('pendaftaran/export', [PendaftaranController::class, 'export'])->name('pendaftaran.export');
Route::put('pendaftaran/{id}/verify', 'App\Http\Controllers\PendaftaranController@verify');
Route::get('pendaftaran/unverify', [PendaftaranController::class, 'belumTerverifikasi'])->name('pendaftaran.unverify');
Route::get('pendaftaran/verify', [PendaftaranController::class, 'terverifikasi'])->name('pendaftaran.verify');
Route::resource('pendaftaran', PendaftaranController::class);

Route::get('/test-s3', [TestController::class, 'testS3']);


Route::get('/gallery', GalleryIndex::class)->name('gallery.index');
Route::get('/gallery/create', GalleryCreate::class)->name('gallery.create');
Route::get('/gallery/edit/{id}', GalleryEdit::class)->name('gallery.edit');
Route::resource('gallery', GalleryController::class);

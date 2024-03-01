<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\komentarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\showuploadcontroller;
use App\Http\Controllers\UploadController;
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

Route::get('/dashboard',[DashboardController::class,'indexDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function (){
    Route::get('/inputimage',[UploadController::class,'inputimage'])->name('inputimage');
    Route::post('/inputimage',[UploadController::class,'upload'])->name('upload');
});

Route::middleware('auth')->group(function(){
    Route::get('/showupload',[showuploadcontroller::class,'showupload'])->name('showupload');
    Route::get('/showalbum',[AlbumController::class,'showAlbum'])->name('showAlbum');
    Route::get('/album/{album}', [AlbumController::class,'showPhotos'])->name('showPhotos');
    Route::post('/uploadalbum',[AlbumController::class,'uploadalbum'])->name('uploadalbum');
    Route::delete('/showalbum/{id}',[AlbumController::class,'delete'])->name('delete');

    // Route untuk menampilkan form edit album
    Route::get('/albums/{id}/edit', [AlbumController::class, 'showeditalbum'])->name('editAlbum');
    
    // Route untuk menyimpan perubahan pada album
    Route::put('/albums/{id}', [AlbumController::class, 'updatealbum'])->name('updateAlbum');
});

// function action dalam Table show data
Route::middleware('auth')->group(function(){
    Route::delete('/foto/{id}', [UploadController::class, 'delete'])->name('foto.delete');
    Route::get('/viewupdate/{id}', [UploadController::class, 'viewupdate']);
    Route::post('/foto/update/{id}', [UploadController::class, 'update'])->name('foto.update');
});


// Komentar file
Route::middleware('auth')->group(function(){
    Route::get('/komentar/{fotoId}', [komentarController::class,'showKomentarFoto'])->name('komentar.foto');
    Route::post('/komentar/create/{id}', [KomentarController::class, 'createKomentar'])->name('createKomentar');

});

require __DIR__.'/auth.php';

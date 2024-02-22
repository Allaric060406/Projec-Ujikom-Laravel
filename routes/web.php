<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
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
    Route::post('/uploadalbum',[AlbumController::class,'uploadalbum'])->name('uploadalbum');
});

Route::middleware('auth')->group(function(){
    // Route::get('/delete/{id}',[showuploadcontroller::class,'detele'])->name('delete');
    Route::delete('/foto/{id}', [showuploadcontroller::class, 'delete'])->name('foto.delete');
});

require __DIR__.'/auth.php';

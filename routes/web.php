<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/kategori/{kategori:slug}', [HomeController::class, 'showCategory'])->name('show-category');

Route::get('/buku/{buku:id}', [DetailController::class, 'show'])->name('detail-book');

Route::get('/tentang', function() {
    return view('about');
})->name('about');

Route::get('/register', [SiswaController::class, 'show'])->name('show-registred');
Route::post('/register', [SiswaController::class, 'post'])->name('post-registred');
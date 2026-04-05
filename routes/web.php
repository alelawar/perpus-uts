<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/kategori/{kategori:slug}', [HomeController::class, 'showCategory'])->name('show-category');
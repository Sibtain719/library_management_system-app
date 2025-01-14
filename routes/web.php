<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('layout/admin_layout');
});

Route::get('/members', function () {
    return view('layout/members_layout');
});

Route::get('/books', function () {
    return view('layout/books_layout');
});

Route::get('/students', function () {
    return view('layout/students_layout');
});

Route::get('/transaction', function () {
    return view('layout/transactions');
});

Route::get('/reports', function () {
    return view('layout/reports');
});

Route::get('/explore_books', function () {
    return view('layout/explore_books');
});
require __DIR__.'/auth.php';

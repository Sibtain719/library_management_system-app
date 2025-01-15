<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\BookCategoryController; 
use App\Models\Books;
use App\Models\Author;
use App\Models\BookCategory;


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
    $books= new Books();
    $books= Books::all();
    $category= new BookCategory();
    $category= BookCategory::all();

    $author= new Author();
    $author= Author::all();
    return view('layout/books_layout', compact('books','category','author'));
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
    $books= new Books();
    $books= Books::all();
    return view('layout/explore_books', compact('books'));
});

Route::get('/addBook',[AdminController::class,'addBooks']);

Route::get('/author_names', function () {
    $author= new Author();
    $author= Author::all();
    return view('layout/author_names',compact('author'));
});


Route::get('/book_category', function () {
    $category= new BookCategory();
    $category = BookCategory::all();
    return view('layout/book_category',compact('category'));
});

Route::post('/add_author',[AuthorController::class,'addAuthor']);
Route::post('/add_category',[BookCategoryController::class,'addBookCategory']);
Route::get('delete_author/{id}',[AuthorController::class,'delete_author']);
Route::get('delete_category/{id}',[BookCategoryController::class,'delete_category']);
Route::get('update_category/{id}',[BookCategoryController::class,'update_category']);
Route::get('update_author/{id}',[AuthorController::class,'update_author']);

Route::get('/librarian_panel',function()
{
    return view('layout/librarian_panel');
});
require __DIR__.'/auth.php';

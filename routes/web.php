<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
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

//test action

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::post('/books', [BookController::class, 'store']);
Route::get('/book/{id}', [BookController::class, 'find'])->name('book-detail');
Route::post('/book/{id}', [BookController::class, 'add_book_user'])->name('add-book-library');
Route::delete('/book/{id}', [BookController::class, 'remove_book_library'])->name('remove-book-library');

Route::get('/my-books', [BookController::class, 'user_list'])->name('my-books');
Route::post('/my-books', [BookController::class, 'add_book_user'])->name('add-book');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

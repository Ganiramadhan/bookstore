<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AssetsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', [AssetsController::class, 'dashboard'])->name('books.dashboard');


Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');


Route::get('/category', [AssetsController::class, 'index'])->name('assets.index');

Route::get('category/create', [AssetsController::class, 'createCategory'])->name('assets.create');
Route::post('category', [AssetsController::class, 'storeCreateCategory'])->name('assets.store');
Route::delete('/category/{id}', [AssetsController::class, 'deleteCategory'])->name('assets.destroy');


Route::get('/category/edit/{id}', [AssetsController::class, 'editCategory'])->name('assets.edit');
Route::put('/category/update/{id}', [AssetsController::class, 'updateCategory'])->name('assets.update');



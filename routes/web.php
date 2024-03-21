<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// HOME | BERANDA
Route::get('/', function () {
    return view('index', ['active' => 'beranda']);
});

// Login 
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

// BOOK
Route::get('/books', [BookController::class, 'index']);
Route::get('/detail-buku/{book}', [BookController::class, 'show']);
Route::get('/tambah-buku', [BookController::class, 'create'])->middleware('auth');
Route::post('/tambah-buku', [BookController::class, 'store'])->middleware('auth');
Route::get('/edit-buku/{book}', [BookController::class, 'edit'])->middleware('auth');
Route::put('/edit-buku/{book}', [BookController::class, 'update'])->middleware('auth');
Route::delete('/hapus-buku/{book}', [BookController::class, 'destroy'])->middleware('auth');

// Dashboard
Route::get('/dashboard', [BookController::class, 'dashboard'])->middleware('auth');
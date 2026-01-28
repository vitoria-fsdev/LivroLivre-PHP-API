<?php

use App\Http\Controllers\Books\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::post('/books/{id}/borrow', [BookController::class, 'borrowBook']);
Route::post('/books/{id}/return', [BookController::class, 'returnBook']);
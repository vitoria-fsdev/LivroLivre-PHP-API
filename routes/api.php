<?php

use App\Http\Controllers\Books\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
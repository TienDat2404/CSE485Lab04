<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowbookController;
use App\Http\Controllers\BookController;   
use App\Http\Controllers\ReaderController;
Route::get('/', function () {
    return view('welcome');
});
Route::resources([
    'borrowbooks' => BorrowbookController::class,
    'books' => BookController::class,
    'readers' => ReaderController::class,
]);
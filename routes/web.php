<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

Route::get('/', function () {
    return redirect()->route('books.index');  
});

Route::get('/hello', function () {
    return view('hello');
});

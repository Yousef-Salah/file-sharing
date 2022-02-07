<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->get('/home', function () {
    return view('index');
})->name('files.home');

Route::middleware('auth')->get('/my-files', function() {
    return view('files.index');
})->name('files.files');

Route::middleware('auth')->get('/create', function() {
    return view('files.create');
})->name('files.files');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

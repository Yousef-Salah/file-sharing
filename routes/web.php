<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Iterator\FilecontentFilterIterator;

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

Route::middleware('auth')->as('files.')->group(function() {
    Route::get('/my-files',[FileController::class,'index'])->name('my-files');
    Route::get('/create',[FileController::class,'create'])->name('create');
    Route::get('/edit/{id}',[FileController::class,'edit'])->name('edit');
    Route::get('down/{linkID}',[FileController::class,'download'])->name('download');
    Route::get('/file-info/{fileID}',[FileController::class,'fileInfo'])->name('info');
    Route::put('/update',[FileController::class,'update'])->name('update');
    Route::post('/store',[FileController::class,'store'])->name('store');
    Route::post('/create/link/{fielID}',[FileController::class,'createLink'])->name('createLink');

    Route::get('/preview/{id}',[FileController::class,'preview'])->name('preview');
});

//Route::get('/create',[FileController::class,'create'])->name('files.create');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

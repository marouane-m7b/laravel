<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/create', [PostController::class, 'create'])->name('createPost');
Route::post('/store', [PostController::class, 'store'])->name('storePost');
Route::get('/post/{id}', [PostController::class, 'show'])->name('showPost');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('editPost');
Route::put('/update/{id}', [PostController::class, 'update'])->name('updatePost');
Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');

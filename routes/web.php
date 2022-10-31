<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;


//HTTP Verbs
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');


Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');


Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::patch('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');


Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

// Route::resource('/posts', PostsController::class);
//-------------Route for invoke method
Route::get('/', HomeController::class);

//-------------Multiple HTTP verbs
// Route::match(['get', 'post'], '/posts', [PostsController::class, 'index']);
// Route::any('/posts', [PostsController::class, 'index']);

//-------------Just return a view
// Route::view('/posts', 'posts.index', ['age'=> '30 Years Old']);

//Fallback Route
Route::fallback(FallbackController::class);
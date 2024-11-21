<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class , 'index'])->name("posts.index");

Route::get('/add', [PostController::class , 'create'])->name("posts.create");

Route::post('/', [PostController::class , 'store'])->name("posts.store");

Route::get('/show/{post}', [PostController::class , 'show'])->name("posts.show");

Route::get('/edit/{post}', [PostController::class , 'edit'])->name("posts.edit");

Route::put('/update/{post}', [PostController::class , 'update'])->name("posts.update");

Route::delete('/show/{post}', [PostController::class , 'destroy'])->name("posts.delete");

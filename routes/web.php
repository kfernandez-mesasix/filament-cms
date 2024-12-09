<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{slug}', [PostController::class, 'show']);

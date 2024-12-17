<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('posts/{slug}', [PostController::class, 'show']);


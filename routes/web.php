<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {return redirect('/post/list');});

Route::get('/post/list', [PostController::class, 'index'])->name('list');

Route::get('/post/detail/{id}', [PostController::class, 'show']);

Route::get('/post/create', [PostController::class, 'create']);

Route::post('/post/create', [PostController::class, 'add']);

Route::get('/post/delete/{id}', [PostController::class, 'delete']);

Route::get('/post/update/{id}', [PostController::class, 'update']);

Route::post('/post/update/{id}', [PostController::class, 'change']);
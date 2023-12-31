<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::post('addPost', [PostController::class, 'addPost']);
Route::get('allPosts', [PostController::class, 'allPosts']);
Route::get('getPost/{id}', [PostController::class, 'getPost']);
Route::put('update/{id}', [PostController::class, 'updatePost']);
Route::delete('delete/{id}', [PostController::class, 'delete']);
Route::get('search/{key}', [PostController::class, 'search']);


Route::post('createCategory', [CategoryController::class, 'createCategory']);

Route::post('addComment', [CommentController::class, 'addComment']);
Route::get('allComments', [CommentController::class, 'allComments']);


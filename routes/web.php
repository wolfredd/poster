<?php

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/allposts', function () {
    return view('allposts');
});

Route::get(`/makecomment`, function () {
    return view('makecomment');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/allcomments', function () {
    return view('allcomments');
});

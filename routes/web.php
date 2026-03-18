<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/services', fn() => view('services'));
Route::get('/team', fn() => view('team'));
Route::get('/admin', fn() => view('admin'));
Route::get('/login', fn() => view('login'));
Route::get('/register', fn() => view('register'));
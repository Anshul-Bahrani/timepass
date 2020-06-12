<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Articlescontroller;
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

Route::get('/','Articlescontroller@index');
// Route::get('/',[Articlescontroller::class, 'index']);
Route::get('/articles', 'Articlescontroller@index');
Route::get('/articles/create', 'Articlescontroller@create');
Route::get('/articles/{article}', 'Articlescontroller@show')->name('articles.show');
Route::post('/articles', 'Articlescontroller@store');
Route::get('/articles/{article}/edit', 'Articlescontroller@edit');
Route::put('/articles/{article}', 'Articlescontroller@update');


Route::get('/posts', function () {
    return view('post');
});

Route::get('/contact', function () {
    return view('contact');
});
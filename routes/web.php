<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('links',[ShortenerController::class,'index'])->name('links.index');
Route::post('generate',[ShortenerController::class,'store'])->name('generate.store');
Route::get('{shortlink}',[ShortenerController::class,'short'])->name('shortlink.short');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

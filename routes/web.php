<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\MainController;

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

Route::get('/',[MainController::class, 'index'])->name('home');

Route::post('/store',[MainController::class, 'store'])->name('post.store');

Route::get('/table',[MainController::class, 'table'])->name('table');

Route::get('/about',[MainController::class, 'about'])->name('about');

Route::get('/pdf/{id}',[MainController::class, 'pdf'])->name('pdf');  

Route::fallback(function () {
    return view('404');
});
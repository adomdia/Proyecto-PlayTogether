<?php

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


// Route::get('/', 'IndexController@index')->name('index.index');
// Route::get('/prueba', 'PruebaController@index')->name('prueba.index');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prueba', [App\Http\Controllers\PruebaController::class, 'index'])->name('prueba');
Route::get('/config', [App\Http\Controllers\ConfigController::class, 'index'])->name('config');
Route::get('/crear', [App\Http\Controllers\CrearController::class, 'index'])->name('crear');


Auth::routes();

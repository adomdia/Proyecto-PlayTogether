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


Route::resource('/user', UserController::class);


Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/config', [App\Http\Controllers\ConfigController::class, 'index'])->name('config');
Route::get('/crear', [App\Http\Controllers\CrearController::class, 'index'])->name('crear');
Route::post('/crearamistad', [App\Http\Controllers\AmistadController::class, 'store'])->name('crearamistad');
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios');

Route::post('/modificaruser', [App\Http\Controllers\UserController::class, 'update'])->name('modificaruser');
Route::post('/crearsolicitud', [App\Http\Controllers\SolicitudAmistadController::class, 'store'])->name('crearsolicitud');
Route::post('/modificaimgperfil', [App\Http\Controllers\UserController::class, 'fPerfil'])->name('modificaimgperfil');


Route::get('/prueba', [App\Http\Controllers\PruebaController::class, 'index'])->name('prueba');
Route::get('/prueba1', [App\Http\Controllers\PruebaController::class, 'index1'])->name('prueba1');

#PUBLICACIONES
Route::post('/crearpublicacion', [App\Http\Controllers\PublicacionController::class, 'store'])->name('crearpublicacion');
Route::delete('/borrarpublicacion', [App\Http\Controllers\PublicacionController::class, 'destroy'])->name('borrarpublicacion');
Route::get('/publicaciones', [App\Http\Controllers\PublicacionController::class, 'index'])->name('publicaciones');
Route::get('/publicaciones/{id}', [App\Http\Controllers\PublicacionController::class, 'show'])->name('publicaciones.show');

#COMENTARIOS
Route::post('/crearcomentario', [App\Http\Controllers\ComentarioController::class, 'store'])->name('crearcomentario');


#ADMIN
Route::get('/indexadministrar', [App\Http\Controllers\AdministradorController::class, 'index'])->name('indexadministrar');



Auth::routes();

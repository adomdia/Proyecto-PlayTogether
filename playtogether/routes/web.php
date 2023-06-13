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
Route::delete('/borrarcomentario', [App\Http\Controllers\ComentarioController::class, 'destroy'])->name('borrarcomentario');


#ADMIN
Route::get('/indexadministrar', [App\Http\Controllers\AdministradorController::class, 'index'])->name('indexadministrar');

#SOLICITUDES
Route::post('/crearsolicitud', [App\Http\Controllers\SolicitudAmistadController::class, 'store'])->name('crearsolicitud');
Route::post('/aceptarsolicitud', [App\Http\Controllers\SolicitudAmistadController::class, 'aceptar'])->name('aceptarsolicitud');
Route::post('/rechazarsolicitud', [App\Http\Controllers\SolicitudAmistadController::class, 'rechazar'])->name('rechazarsolicitud');

#AMIGOS
Route::get('/amigos', [App\Http\Controllers\AmistadController::class, 'index'])->name('amigos');
Route::post('/eliminaramigo', [App\Http\Controllers\AmistadController::class, 'eliminar'])->name('eliminaramigo');

#PERFIL
Route::get('/perfil/{id}', [App\Http\Controllers\UsuariosController::class, 'mostrar'])->name('perfil');

#CONTENIDO
Route::get('/contenido', [App\Http\Controllers\ContenidoController::class, 'index'])->name('contenido');
Route::get('/cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos');
Route::get('/foros', [App\Http\Controllers\ForoController::class, 'index'])->name('foros');

//#FORO
Route::post('/creartemaforo', [App\Http\Controllers\TemaForoController::class, 'store'])->name('creartemaforo');
Route::delete('/borrartemaforo', [App\Http\Controllers\TemaForoController::class, 'destroy'])->name('borrartemaforo');
Route::get('/temaforo/{id}', [App\Http\Controllers\TemaForoController::class, 'show'])->name('temaforo.show');
Route::post('/comentar', [App\Http\Controllers\ComentarioTemaController::class, 'store'])->name('comentar');
Route::delete('/borrarcomentarioforo', [App\Http\Controllers\ComentarioTemaController::class, 'destroy'])->name('borrarcomentarioforo');
Route::post('/upvotecomentarioforo', [App\Http\Controllers\ComentarioTemaController::class, 'upvote'])->name('upvotecomentarioforo');
Route::post('/downvotecomentarioforo', [App\Http\Controllers\ComentarioTemaController::class, 'downvote'])->name('downvotecomentarioforo');


//#CURSOS
Route::get('/crearcurso', [App\Http\Controllers\CursoController::class, 'crearcurso'])->name('crearcurso');
Route::post('/createcurso', [App\Http\Controllers\CursoController::class, 'store'])->name('createcurso');
Route::get('/curso_single/{id}', [App\Http\Controllers\CursoController::class, 'single'])->name('curso_single');
Route::delete('/borrarcurso', [App\Http\Controllers\CursoController::class, 'destroy'])->name('borrarcurso');

#PAGOS
Route::post('/procesar-pago', [App\Http\Controllers\PagoController::class, 'procesarPago'])->name('procesar.pago');
Route::get('/pago', [App\Http\Controllers\PagoController::class, 'index'])->name('pago');

#USUARIOS
Route::delete('/borrarusuario', [App\Http\Controllers\UsuariosController::class, 'destroy'])->name('borrarusuario');

#CHAT
Route::get('/chat/{id}', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::post('/enviarMensaje', [App\Http\Controllers\ChatController::class, 'send'])->name('enviarMensaje');

#MENSAJES
Route::get('mensajes', [App\Http\Controllers\MensajesController::class, 'index'])->name('mensajes');



#MODO OSCURO
Route::get('modo-oscuro', [App\Http\Controllers\ModoOscuroController::class, 'cambiarModo'])->name('modo-oscuro');





Auth::routes();

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class,'index'])->name('home');
//--------------------------------------Nuevo anuncio----------------------------------------------------------------------
Route::get('/ad/new', [HomeController::class,'newAd'])->name('ad.new');//Ruta para insertar nuevo anuncio
Route::post('/ad/create', [HomeController::class,'createAd'])->name('ad.create');//Ruta guardado anuncio nuevo en DataBase
//--------------------------------------Nuevo anuncio----------------------------------------------------------------------
Route::get('/category/{name}/{id}/ads', [PublicController::class,'adsByCategory'])->name('category.ads');// Visualizar anuncios agrupados por categorias
Route::get('/revisor',[RevisorController::class,'index'] )->name('revisor.home');// Ruta para el revisor y ver los anuncios
//--------------------------------------Revisor aceptar o rechazar anuncio----------------------------------------------------------------------
Route::post('/revisor/ad/{id}/accept',[RevisorController::class,'accept'])->name('revisor.ad.accept');
Route::post('/revisor/ad/{id}/reject',[RevisorController::class,'reject'])->name('revisor.ad.reject');
//--------------------------------------Revisor aceptar o rechazar anuncio----------------------------------------------------------------------
Route::post('/locale/{locale}', [PublicController::class,'locale'])->name('locale');// Ruta banderitas de idiomas
Route::post('/ad/images/upload', [HomeController::class,'uploadImages'])->name('ad.images.upload');// Ruta comportamiento Drop zone imagenes

Route::delete('/ad/images/remove', [HomeController::class,'removeImages'])->name('ad.images.remove');//ruta para eliminar imagenes
Route::get('/ad/images', [HomeController::class,'getImages'])->name('ad.images');//ruta para que nos devuelva la imagen en caso de error de validacion
Route::get('/search', [PublicController::class,'search'])->name('search');//Ruta para el buscador de la navbar
Route::get('/ad/{id}', [PublicController::class,'details'])->name("ad.details");// Pagina detalle de cada anuncio
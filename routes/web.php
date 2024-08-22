<?php

use lib\Route;

use app\Controllers\HomeController;
use app\Controllers\LocalidadesController;
use app\Controllers\ProveedoresController;

//se definen todas las rutas 
Route::get('/',[HomeController::class, 'index']);

Route::get('/proveedores',[ProveedoresController::class, 'index']);

Route::get('/proveedores/alta',[ProveedoresController::class, 'create']);

Route::post('/proveedores', [ProveedoresController::class, 'save']);

Route::get('/proveedores/:id', [ProveedoresController::class, 'show']);

Route::get('/proveedores/:id/modificar', [ProveedoresController::class, 'edit']);

Route::post('/proveedores/:id', [ProveedoresController::class, 'update']);

Route::post('/proveedores/:id/baja', [ProveedoresController::class, 'delete']);

Route::get('/localidades',[LocalidadesController::class, 'index']);

Route::get('/localidades/alta',[LocalidadesController::class, 'create']);

Route::post('/localidades', [LocalidadesController::class, 'save']);

Route::get('/localidades/:id/modificar', [LocalidadesController::class, 'edit']);

Route::post('/localidades/:id', [LocalidadesController::class, 'update']);

Route::post('/localidades/:id/baja', [LocalidadesController::class, 'delete']);

//el metodo dispatch es el encargado de despachar las solicitudes entrantes para las rutas correspondientes.
Route::dispatch();
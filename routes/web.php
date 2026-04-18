<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    //* Generar rutas de todos los métodos del controlador
    Route::resource('libros', LibroController::class);
});

//? Ruta para mostrar catalogo de libros
Route::get('/home', [
    LibroController::class, 'home'
])->name('home');

//* Crear ruta para la vista de actualización de un registro */
Route::get('/libros/{id}/edit', [
    LibroController::class, 'edit'
])->name('libros.edit');

//* Crear ruta para actualizar el registro
Route::put('/libros/{id}', [
    LibroController::class, 'update'
])->name("libros.update");

//* Ruta para el formulario de registro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//* Ruta para ejecutar el formulario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//* Ruta para manejar la vista de inicio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//* Ruta para manejar los datos de inicio de sesión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//* Ruta para cerrar sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');   
});


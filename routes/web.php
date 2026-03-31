<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

/* Deploy Helper in Shared Hosting */
Route::get('/deploy-helper', function () {
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('config:cache');
    return "Despliegue finalizado con éxito";
});

Route::get('/deploy-finish', function () {
    // Ejecuta las migraciones pendientes
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('db:seed');

    // Limpia y regenera la caché de rutas y configuración
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');

    return "Despliegue completado con éxito y caché optimizada.";
});

require __DIR__.'/auth.php';

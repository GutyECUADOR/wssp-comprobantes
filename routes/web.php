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

Route::get('/linkstorage', function () {
    // Ruta origen: donde están los archivos reales
    $target = '/home/kao/laravel/storage/app/public'; 
    // Ruta destino: donde quieres que se vea el acceso directo
    $link = '/home/kao/public_html/storage'; 

    if (file_exists($link)) {
        return "El enlace simbólico ya existe.";
    }

    if (symlink($target, $link)) {
        return "Enlace simbólico creado exitosamente de $target a $link";
    } else {
        return "Error: No se pudo crear el enlace simbólico. Verifica los permisos.";
    }
});

Route::get('/clear-cache', function() {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "Caché de rutas y configuración limpia";
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

/* Deploy Helper in Shared Hosting */
Route::get('/deploy-finish', function () {
    // Ejecuta las migraciones pendientes
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('db:seed', ['--force' => true]);

    // Limpia y regenera la caché de rutas y configuración
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');

    return response()->json([
            'status' => 'success',
            'message' => 'Despliegue completado con éxito y caché optimizada.'
        ]);
});

require __DIR__.'/auth.php';

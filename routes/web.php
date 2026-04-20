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

use App\Http\Controllers\LevelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FenomenoController;

Route::get('/', function () {
    return view('pages.inicio');
})->name('inicio');

// Rutas de componentes dinámicos
Route::get('/fenomenos', [FenomenoController::class, 'index'])->name('fenomenos.index');

Route::get('/sugerencias', function () {
    return view('pages.sugerencias');
})->name('sugerencias');

Route::get('/informacion', function () {
    return view('pages.informacion');
})->name('informacion');

Route::get('/recompensas', function () {
    return view('pages.recompensas');
})->name('recompensas');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas dinámicas de aprendizaje (requieren estar logueado para ver el contenido y guardar progreso)
    Route::get('/aprende', [LevelController::class, 'index'])->name('aprende');
    Route::get('/aprende/{level}', [LevelController::class, 'show'])->name('levels.show');
    Route::get('/aprende/{level}/{lesson}', [\App\Http\Controllers\LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lecciones/{lesson}/completar', [\App\Http\Controllers\LessonController::class, 'complete'])->name('lessons.complete');
    
    // Rutas de eventos que requieren autenticación para asistir
    Route::post('/eventos/{event}/asistir', [EventController::class, 'attend'])->name('events.attend');
});

// Rutas públicas de eventos (ver lista y detalles sin estar logueado)
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
Route::get('/eventos/{event:slug}', [EventController::class, 'show'])->name('events.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Rutas protegidas del CRUD
    Route::resource('admin/levels', App\Http\Controllers\Admin\LevelController::class)->names('admin.levels');
    Route::resource('admin/lessons', App\Http\Controllers\Admin\LessonController::class)->names('admin.lessons');
    Route::resource('admin/events', App\Http\Controllers\Admin\EventController::class)->names('admin.events');
});

require __DIR__ . '/auth.php';
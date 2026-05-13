<?php

/*
|--------------------------------------------------------------------------
| Rutas Web — NovaCore
|--------------------------------------------------------------------------
| Aquí se definen todas las rutas de la aplicación web.
| Se organizan en 3 grupos:
|   1. Rutas públicas (accesibles sin login)
|   2. Rutas protegidas (requieren autenticación)
|   3. Rutas de administración (requieren rol admin)
|
| Las rutas de autenticación (login, register, logout) se cargan
| desde el archivo routes/auth.php al final de este archivo.
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FenomenoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\RewardController;

// =========================================================================
// 1. RUTAS PÚBLICAS — Accesibles sin iniciar sesión
// =========================================================================

// Página principal
Route::get('/', function () {
    return view('pages.inicio');
})->name('inicio');

// Observatorio: Fenómeno astronómico del día (APOD de la NASA)
Route::get('/fenomenos', [FenomenoController::class, 'index'])->name('fenomenos.index');

// Buzón de sugerencias
Route::get('/sugerencias', function () {
    return view('pages.sugerencias');
})->name('sugerencias');
Route::post('/sugerencias', [SuggestionController::class, 'store'])->name('sugerencias.store');

// Página de información general del proyecto
Route::get('/informacion', function () {
    return view('pages.informacion');
})->name('informacion');

// Eventos: listado y detalle (públicos para que cualquiera los vea)
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
Route::get('/eventos/{event:slug}', [EventController::class, 'show'])->name('events.show');

// =========================================================================
// 2. RUTAS PROTEGIDAS — Requieren autenticación
// =========================================================================

Route::middleware(['auth'])->group(function () {

    // Centro de mando (Dashboard del usuario)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Actualizar perfil (nombre, email, avatar, contraseña)
    Route::post('/perfil/actualizar', [ProfileController::class, 'update'])->name('profile.update');

    // --- Academia Estelar (Sistema de aprendizaje por niveles) ---
    Route::get('/aprende', [LevelController::class, 'index'])->name('aprende');
    Route::get('/aprende/{level}', [LevelController::class, 'show'])->name('levels.show');
    Route::get('/aprende/{level}/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lecciones/{lesson}/completar', [LessonController::class, 'complete'])->name('lessons.complete');

    // --- Eventos: acción de asistir (requiere estar logueado) ---
    Route::post('/eventos/{event}/asistir', [EventController::class, 'attend'])->name('events.attend');

    // --- Sistema de Recompensas y Títulos ---
    Route::get('/recompensas', [RewardController::class, 'index'])->name('recompensas');
    Route::post('/recompensas/equipar/{achievement}', [RewardController::class, 'equip'])->name('recompensas.equip');
});

// =========================================================================
// 3. RUTAS DE ADMINISTRACIÓN — Requieren autenticación + rol admin
// =========================================================================

Route::middleware(['auth', 'admin'])->group(function () {

    // Panel principal del admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD completo para cada módulo (Route::resource genera 7 rutas: index, create, store, show, edit, update, destroy)
    Route::resource('admin/levels', App\Http\Controllers\Admin\LevelController::class)->names('admin.levels');
    Route::resource('admin/lessons', App\Http\Controllers\Admin\LessonController::class)->names('admin.lessons');
    Route::resource('admin/events', App\Http\Controllers\Admin\EventController::class)->names('admin.events');
    Route::resource('admin/fenomenos', App\Http\Controllers\Admin\FenomenoController::class)->names('admin.fenomenos');
    Route::resource('admin/rewards', App\Http\Controllers\Admin\RewardController::class)->names('admin.rewards');
    Route::resource('admin/users', App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::resource('admin/suggestions', App\Http\Controllers\Admin\SuggestionController::class)->names('admin.suggestions');
    Route::resource('admin/ranks', App\Http\Controllers\Admin\RankController::class)->names('admin.ranks');
});

// Cargar rutas de autenticación (login, register, logout)
require __DIR__ . '/auth.php';
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

Route::get('/', function () {
    return view('pages.inicio');
})->name('inicio');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas dinámicas de aprendizaje (requieren estar logueado para ver el contenido y guardar progreso)
    Route::get('/aprende', [LevelController::class, 'index'])->name('aprende');
    Route::get('/aprende/{level}', [LevelController::class, 'show'])->name('levels.show');
    Route::get('/aprende/{level}/{lesson}', [\App\Http\Controllers\LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lecciones/{lesson}/completar', [\App\Http\Controllers\LessonController::class, 'complete'])->name('lessons.complete');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Rutas protegidas del CRUD
    Route::resource('admin/levels', App\Http\Controllers\Admin\LevelController::class)->names('admin.levels');
    Route::resource('admin/lessons', App\Http\Controllers\Admin\LessonController::class)->names('admin.lessons');
});

require __DIR__ . '/auth.php';
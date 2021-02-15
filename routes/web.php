<?php

use App\Http\Controllers\{PostController, TeamController};
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('index');
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('create', [PostController::class, 'store'])->name('store');
        Route::get('{post:slug}', [PostController::class, 'show'])->name('show');
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('{post}/edit', [PostController::class, 'update'])->name('update');
        Route::delete('{post}', [PostController::class, 'destroy'])->name('delete');
    });

    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('', [TeamController::class, 'index'])->name('index');
        Route::get('create', [TeamController::class, 'create'])->name('create');
        Route::post('create', [TeamController::class, 'store'])->name('store');
        Route::get('{team}/edit', [TeamController::class, 'edit'])->name('edit');
        Route::put('{team}/edit', [TeamController::class, 'update'])->name('update');
        Route::delete('{team}', [TeamController::class, 'destroy'])->name('delete');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

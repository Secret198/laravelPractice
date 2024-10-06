<?php

use App\Http\Controllers\AitoolsController;
use App\Http\Controllers\ControllerCategories;
use App\Http\Controllers\ControllerTag;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/aitools', [AitoolsController::class, 'store'])->name('aitools.store');
    Route::patch('/aitools/{aitool}', [AitoolsController::class, 'update'])->name('aitools.update');
    Route::get('/aitools/create', [AitoolsController::class, 'create'])->name('aitools.create');
    Route::get('/aitools/{aitool}/edit', [AitoolsController::class, 'store'])->name('aitools.edit');
    Route::delete('/aitools/{aitool}', [AitoolsController::class, 'destroy'])->name('aitools.destroy');

    Route::post('/categories', [ControllerCategories::class, 'store'])->name('categories.store');
    Route::patch('/categories/{aitool}', [ControllerCategories::class, 'update'])->name('categories.update');
    Route::get('/categories/create', [ControllerCategories::class, 'create'])->name('categories.create');
    Route::get('/categories/{aitool}/edit', [ControllerCategories::class, 'store'])->name('categories.edit');
    Route::delete('/categories/{aitool}', [ControllerCategories::class, 'destroy'])->name('categories.destroy');

    Route::post('/tags', [ControllerTag::class, 'store'])->name('tags.store');
    Route::patch('/tags/{aitool}', [ControllerTag::class, 'update'])->name('tags.update');
    Route::get('/tags/create', [ControllerTag::class, 'create'])->name('tags.create');
    Route::get('/tags/{aitool}/edit', [ControllerTag::class, 'store'])->name('tags.edit');
    Route::delete('/tags/{aitool}', [ControllerTag::class, 'destroy'])->name('tags.destroy');
});

require __DIR__.'/auth.php';

Route::get('/aitools', [AitoolsController::class, 'index'])->name('aitools.index');
Route::get('/aitools/{id}', [AitoolsController::class, 'show'])->name('aitools.show');

Route::get('/categories', [AitoolsController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [AitoolsController::class, 'show'])->name('categories.show');

Route::get('/tags', [AitoolsController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [AitoolsController::class, 'show'])->name('tags.show');
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalPopulationController;

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

// Primary
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/animal-population', function () {
    return view('animal.population');
})->middleware(['auth', 'verified'])->name('animal.population');

Route::get('/animal-list', function () {
    return view('animal.list');
})->middleware(['auth', 'verified'])->name('animal.list');

Route::get('/animal-type', function () {
    return view('animal.type');
})->middleware(['auth', 'verified'])->name('animal.type');


// Add data
Route::post('/animal-population', 'App\Http\Controllers\AnimalPopulationController@store')->middleware(['auth', 'verified'])->name('animal.population.store');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

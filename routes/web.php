<?php

use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', HomePage::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rutes per a llibres
Route::Resource('books', BookController::class);

// Rutes per a cursos
Route::Resource('courses', CourseController::class);

// Rutes per a famílies
Route::Resource('families', FamilyController::class);

// Rutes per a mòduls
Route::Resource('modules', ModuleController::class);
// Rutes per a vendes
Route::Resource('sales', SaleController::class);

// Rutes per a openai
Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index');

// Rutes per a google

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

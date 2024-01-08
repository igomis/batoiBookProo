<?php

use App\Http\Controllers\BookController;
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

Route::get('/', HomePage::class)->name('home');
Route::get('/dashboard', DashBoard::class)->name('dashboard');
/*
Route::get('/dashboard', function ($missatge = 'Benvingut al teu perfil') {
    return view('dashboard')->with('missatge', $missatge);
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('is_admin')->group(function () {
    Route::Resource('users', UserController::class);
});

require __DIR__.'/auth.php';

// Rutes per a llibres
Route::Resource('books', BookController::class);
Route::get('/books/{book}/admetre', [BookController::class, 'admetre'])->name('books.admetre');
Route::post('/books/{book}/sale', [BookController::class, 'sale'])->name('books.sale')->middleware('auth');

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

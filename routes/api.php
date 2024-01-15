<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FamilyController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('modules',ModuleController::class);
Route::apiResource('courses',CourseController::class);
Route::apiResource('families',FamilyController::class);
Route::apiResource('books',BookController::class)->middleware('auth:sanctum');
Route::apiResource('users',UserController::class);
Route::apiResource('sales',SaleController::class);
Route::post('/login', [LoginController::class, 'login']);



<?php

use App\Http\Controllers\NavigationController;
use App\Models\DishType;
use App\Models\Specialty;
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

Route::get('/', [NavigationController::class, 'homepage']);
Route::get('menu', [NavigationController::class, 'menu']);
Route::get('contact', [NavigationController::class, 'contact']);
Route::get('news', [NavigationController::class, 'news']);
Route::get('specialties', [NavigationController::class, 'specialties']);

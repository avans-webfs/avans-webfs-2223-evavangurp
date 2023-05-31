<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
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
Route::get('/menu', [NavigationController::class, 'menu']);
Route::get('/contact', [NavigationController::class, 'contact']);
Route::get('/news', [NavigationController::class, 'news']);
Route::get('/specialties', [NavigationController::class, 'specialties']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:admin')->group(function() {
    Route::resource('/admin/menu', DishController::class);
    Route::resource('/admin/specialties', SpecialtyController::class);
    Route::resource('/admin/news', NewsController::class);
    Route::resource('/admin/order', OrderController::class);
});

require __DIR__.'/auth.php';

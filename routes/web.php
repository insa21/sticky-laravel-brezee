<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();
    Route::spladePasswordConfirmation();
    Route::spladeTable();
    Route::spladeUploads();

    Route::get('/', HomeController::class)->name('home');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

//    Route::get('/dashboard', DashboardController::class)
//        ->middleware(['auth', 'verified'])
//        ->name('dashboard');



    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');

    // Authenticated routes
    Route::middleware('auth')->group(function () {
        Route::middleware('verified')->group(function () {
            Route::resource('/stores', StoreController::class)->except('index');
        }
        );


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

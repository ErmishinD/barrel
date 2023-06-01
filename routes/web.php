<?php

use App\Http\Controllers\PetrolItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Models\PetrolItem;
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

Route::view('/', 'app.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->group(function() {
        Route::get('/', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::resource('petrol_items', PetrolItemController::class);
        Route::resource('promotions', PromotionController::class);
    });
});

require __DIR__.'/auth.php';

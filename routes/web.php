<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CoorController;
use App\Http\Controllers\LandingController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    return view('frontpage.landing');
});

Route::get('/globe', function(){
    return view('frontpage.index');
});

Route::get('/landing', [LandingController::class, 'index']);
Route::get('/detail', [LandingController::class, 'detail']);


Route::get('/api/maps', [CoorController::class, 'getCoor']);

Route::resource('/book', BookController::class);

// Route::resource('/adminpage', AdminController::class);

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::resource('/adminpage', AdminController::class);
    Route::put('/adminpage/{id}', [AdminController::class, 'update'])->name('adminpage.update');

   });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

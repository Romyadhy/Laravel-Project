<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CombineController;
use App\Http\Controllers\API\TesController;
// use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('book', BookController::class);

Route::apiResource('tes', TesController::class);

// Route::apiResource('picup', CombineController::class);

Route::get('picups', [CombineController::class, 'index']);
Route::get('picups/{id}', [CombineController::class, 'show']);
Route::post('picups', [CombineController::class, 'store']);
Route::put('picups/{id}', [CombineController::class, 'update']);
Route::delete('picups/{id}', [CombineController::class, 'destroy']);

Route::get('maps', [CombineController::class, 'index']);

// Route::get('maps', [BookController::class, 'getCoor']);


Route::get('book', [BookController::class, 'index']);
Route::get('book/{id}', [BookController::class, 'show']);
Route::post('book', [BookController::class, 'store']);
Route::put('book/{id}', [BookController::class, 'update']);
Route::delete('book/{id}', [BookController::class, 'destroy']);


<?php

use App\Http\Controllers\CardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/cards', [CardController::class, 'index'])->middleware(['auth']);
Route::get('/cards/detail/{id}', [CardController::class, 'show'])->middleware(['auth']);;
Route::get('/cards/lookup', function() {
    return view('lookup_card');
})->middleware(['auth']);;
// Route::get('/cards/lookup/{id}', [CardController::class, 'create']);
Route::post('/cards/lookup', [CardController::class, 'create'])->middleware(['auth']);;
// Route::get('/cards/lookup/{name}', [CardController::class, 'create']);
Route::post('/cards', [CardController::class, 'store'])->middleware(['auth']);;
Route::get('/cards/destroy', [CardController::class, 'destroy'])->middleware(['auth']);;
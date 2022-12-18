<?php

use App\Http\Controllers\CodeController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function() {
    \Illuminate\Support\Facades\Auth::logout();
})->middleware(['auth']);

Route::get('/create', [CodeController::class, 'create'])->middleware(['auth']);
Route::post('/create', [CodeController::class, 'store'])->middleware(['auth']);
Route::get('/{code}', [CodeController::class, 'view']);
Route::post('/{code}', [CodeController::class, 'update'])->middleware(['auth']);



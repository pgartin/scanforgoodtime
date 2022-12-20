<?php

use App\Http\Controllers\CodeController;
use Illuminate\Support\Facades\Auth;
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
    Auth::logout();
})->middleware(['auth']);

Route::get('/code/create', [CodeController::class, 'create'])->middleware(['auth']);
Route::post('/code/create', [CodeController::class, 'store'])->middleware(['auth']);
Route::get('/codes', [CodeController::class, 'list'])->middleware(['auth']);
Route::get('codes/{code}', [CodeController::class, 'view']);
Route::post('codes/{code}', [CodeController::class, 'update'])->middleware(['auth']);



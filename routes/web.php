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

Route::get('/codes/create', [CodeController::class, 'create'])->name('codes.create')->middleware(['auth']);
Route::post('/codes/create', [CodeController::class, 'store'])->name('codes.store')->middleware(['auth']);
Route::get('/codes', [CodeController::class, 'list'])->name('codes.list')->middleware(['auth']);
Route::get('codes/{code}', [CodeController::class, 'view'])->name('codes.view');
Route::post('codes/{code}', [CodeController::class, 'update'])->name('codes.update')->middleware(['auth']);



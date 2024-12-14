<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('contacts', ContactController::class)->only('index', 'show');
Route::resource('contacts', ContactController::class)->middleware('auth')->except('index', 'show');

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

Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('contacts/create', [ContactController::class, 'create'])->middleware('auth')->name('contacts.create');
Route::post('contacts', [ContactController::class, 'store'])->middleware('auth')->name('contacts.store');
Route::get('contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('contacts/{id}/edit', [ContactController::class, 'edit'])->middleware('auth')->name('contacts.edit');
Route::put('contacts/{id}', [ContactController::class, 'update'])->middleware('auth')->name('contacts.update');
Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->middleware('auth')->name('contacts.destroy');


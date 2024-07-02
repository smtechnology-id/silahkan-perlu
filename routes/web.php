<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PimpinanController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/', [AuthController::class, 'login'])->name('index');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/eventConfirm', [AdminController::class, 'eventConfirm'])->name('admin.eventConfirm');
    Route::get('/admin/eventImplementedShow', [AdminController::class, 'eventImplementedShow'])->name('admin.eventImplementedShow');

    Route::get('/admin/event', [AdminController::class, 'event'])->name('admin.event');
    Route::get('/admin/addEvent', [AdminController::class, 'addEvent'])->name('admin.addEvent');
    Route::post('/admin/addEventPost', [AdminController::class, 'addEventPost'])->name('admin.addEventPost');
    Route::post('/admin/delete-event', [AdminController::class, 'deleteEventPost'])->name('admin.deleteEventPost');
    Route::post('/admin/eventImplemented', [AdminController::class, 'eventImplemented'])->name('admin.eventImplemented');
    Route::post('/admin/addInstruction', [AdminController::class, 'addInstruction'])->name('admin.addInstruction');

    
    Route::post('/admin/updateEventPost', [AdminController::class, 'updateEventPost'])->name('admin.updateEventPost');
});

Route::middleware(['auth', 'role:pimpinan'])->group(function () {
    Route::get('/pimpinan/dashboard', [PimpinanController::class, 'index'])->name('pimpinan.dashboard');
    Route::get('/pimpinan/event', [PimpinanController::class, 'event'])->name('pimpinan.event');
    Route::post('/pimpinan/addInstruction', [PimpinanController::class, 'addInstruction'])->name('pimpinan.addInstruction');
    
    Route::get('/pimpinan/eventHistory', [PimpinanController::class, 'eventHistory'])->name('pimpinan.eventHistory');
});

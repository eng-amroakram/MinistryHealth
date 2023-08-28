<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelViewController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(PanelViewController::class)->prefix('panel/')->as('panel.')->middleware(['auth', 'web'])->group(function () {
    Route::get('home', 'home')->name('home');
    Route::get('employees', 'employees')->name('employees');
});

Route::controller(ViewController::class)->prefix('/')->as('web.')->group(function () {
    Route::get('home', 'home')->name('home');
    Route::get('login', 'login')->name('login');

    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('forms/{type?}/', 'forms')->name('forms');
        Route::get('forms/u/{employee}', 'employeeForms')->name('employee.forms');
        Route::get('signature', 'signature')->name('signature');
        Route::post('signature', 'signatureUpload')->name('signature');
        Route::get('logout', 'logout')->name('logout');
    });
});

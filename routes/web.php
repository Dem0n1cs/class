<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\SchoolClassController;
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
    return view('welcome');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('authenticate', 'authenticate')->name('authenticate')->middleware('guest');
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::controller(PeoplesController::class)->group(function () {
        Route::get('show_class/{schoolClass}', 'show_class')->name('peoples.show_class');
        Route::get('create/{schoolClass}', 'create')->name('peoples.create');
        Route::post('store/{schoolClass}', 'store')->name('peoples.store');
        Route::get('edit/{people}', 'edit')->name('peoples.edit');
        Route::post('update/{people}', 'update')->name('peoples.update');
        Route::delete('destroy/{people}', 'destroy')->name('peoples.destroy');
    });
    Route::resource('school_classes', SchoolClassController::class)->except('show');
});



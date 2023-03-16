<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin
Route::prefix('admin')->name('admin.')
->controller(AdminController::class)
->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/login','login')->name('login');
        Route::post('/check','check')->name('check');
    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home','home')->name('home');
        Route::get('/logout','logout')->name('logout');
    });

});



// docto

Route::controller(DoctorController::class)->prefix('/doctor')
    ->name('doctor.')
    ->group(function(){

        Route::middleware('guest:doctor')->group(function(){
            Route::get('/login','login')->name('login');
            Route::post('/check','check')->name('check');
        });
        Route::middleware('auth:doctor')->group(function(){
            Route::get('/home','home')->name('home');
            Route::post('/logout','logout')->name('logout');
        });
    });
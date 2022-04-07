<?php

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

/* Routes for Laravel authentication */
Auth::routes();

/* Route path of the system */
Route::get('/', function () {
    return view('welcome');
});

/* Route home to redirect at the dashboard */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');

/* Route resource for the services */
Route::resource('services', App\Http\Controllers\ServiceController::class)->names('services')->middleware('auth');

/* Ruta  resources for the users*/
Route::resource('users', App\Http\Controllers\UserController::class)->names('users')->middleware('auth');


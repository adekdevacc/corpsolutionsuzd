<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('home')->name('home.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/','index');
        Route::get('/create','create')->name('create');
        Route::post('/create','store')->name('store'); 
        Route::get('/show/{id}','show')->name('show'); 
        Route::post('/show/{id}','update')->name('update');
        Route::delete('/destroy/{id}','destroy')->name('destroy');    
    });
});

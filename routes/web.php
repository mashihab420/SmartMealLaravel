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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/shihab', 'App\Http\Controllers\DefaultController@createManager');

Route::get('/crud', 'App\Http\Controllers\DefaultController@crud');

Route::POST('/manager/create', [\App\Http\Controllers\DefaultController::class,'storeManager']);

Route::GET('/manager/edit/{id}', [\App\Http\Controllers\DefaultController::class,'editManager']);
Route::POST('/manager/update/{id}', [\App\Http\Controllers\DefaultController::class,'managerUpdate']);

Route::GET('/manager/delete/{id}', [\App\Http\Controllers\DefaultController::class,'managerDelete']);

Route::GET('/manager/search', [\App\Http\Controllers\DefaultController::class,'searchManager']);



include ('api.php');

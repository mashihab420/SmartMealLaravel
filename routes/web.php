<?php

use App\Http\Controllers\DefaultController;
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

Route::POST('/manager/create', [DefaultController::class,'storeManager']);

Route::GET('/manager/edit/{id}', [DefaultController::class,'editManager']);
Route::POST('/manager/update/{id}', [DefaultController::class,'managerUpdate']);

Route::GET('/manager/delete/{id}', [DefaultController::class,'managerDelete']);

Route::GET('/manager/search', [DefaultController::class,'searchManager']);



include ('api.php');

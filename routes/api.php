<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('/createmanager',[
    'as' => 'api.manager-create',
    'uses' => 'App\Http\Controllers\ApiController@createManager',
]);


Route::POST('/manager-login',[
    'as' => 'api.manager-login',
    'uses' => 'App\Http\Controllers\ApiController@loginManager',
]);
Route::POST('/create-member', 'App\Http\Controllers\ApiController@CreateMember');

Route::POST('/member-login', 'App\Http\Controllers\ApiController@loginMember');

Route::POST('/insert-meal', 'App\Http\Controllers\ApiController@InsertMeal');

Route::POST('/get-all-meal', 'App\Http\Controllers\ApiController@GetAllMeal');

Route::POST('/get-total-meal', 'App\Http\Controllers\ApiController@GetTotalMeal');

Route::POST('/get-user-total-meal', 'App\Http\Controllers\ApiController@GetUserMeal');

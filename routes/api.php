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

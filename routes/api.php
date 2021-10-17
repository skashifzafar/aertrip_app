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

Route::get('home', 'App\Http\Controllers\ApiController@home');
Route::get('employee/search', 'App\Http\Controllers\ApiController@searchEmployee');
Route::get('employee/view', 'App\Http\Controllers\ApiController@viewEmployee');
Route::post('department/add', 'App\Http\Controllers\ApiController@createDepartment');
Route::post('employee/add', 'App\Http\Controllers\ApiController@addEmployee');
Route::put('employee/update', 'App\Http\Controllers\ApiController@updateEmployee');
Route::delete('employee/delete','App\Http\Controllers\ApiController@deleteEmployee');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

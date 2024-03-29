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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});




Route::get('test',function (Request $request){
    \Log::info($request->getClientIp());
});

//Route::group(['middleware' => 'ip-whitelists'], function (){
    Route::get('projects/all','API\ProjectController@index');
    Route::post('projects/detail','API\ProjectController@detail');
    Route::get('jobs/all','API\JobController@index');
    Route::post('jobs/detail','API\JobController@detail');
//});

Route::get('testing',function(){
    return response()->json(['status' => 0]);
});


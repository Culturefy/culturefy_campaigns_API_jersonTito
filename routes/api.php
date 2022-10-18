<?php

use App\Http\Controllers\API\CampaignsAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('campaigns','\App\Http\Controllers\API\CampaignsAPIController@index');
Route::get('campaigns/{campaigns}','\App\Http\Controllers\API\CampaignsAPIController@show');
Route::post('campaigns','\App\Http\Controllers\API\CampaignsAPIController@store');
Route::put('campaigns/{campaigns}','\App\Http\Controllers\API\CampaignsAPIController@update');
Route::delete('campaigns/{campaigns}','\App\Http\Controllers\API\CampaignsAPIController@destory');
Route::put('campaigns-archive/{campaigns}','\App\Http\Controllers\API\CampaignsAPIController@archiveCampaign');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\providerController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('price-credit/{prefix}', 'App\Http\Controllers\providerController@get_provider_price_credit');
Route::get('price-paketData/{prefix}', 'App\Http\Controllers\providerController@get_provider_price_data');

Route::post('price-freefire', 'App\Http\Controllers\providerController@get_freefire_price');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Barryvdh\Cors\HandleCors;
use Barryvdh\Cors\Cors;
use App\Http\Middleware\AddCorsHeaders;

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

Route::post('/register', 'AuthController@register')->middleware('AddCorsHeaders');


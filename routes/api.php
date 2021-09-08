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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


/*Route::post('/test',function (){
    return 'salam';
});*/


Route::apiResource('/register',\App\Http\Controllers\Admin\AuthController::class)->only('store');
Route::post('/user',[\App\Http\Controllers\Admin\AuthController::class,'store']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [\App\Http\Controllers\Admin\AuthController::class,'index']);

    Route::delete('/user', [\App\Http\Controllers\Admin\AuthController::class ,'destroy']);
    Route::apiResource('/document_types',\App\Http\Controllers\Admin\DocumentTypeController::class);

});
Route::apiResource('books',\App\Http\Controllers\Admin\BookController::class);



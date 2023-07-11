<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocTemplateController;
use App\Http\Controllers\Api\DocFieldController;

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResources([

    'docs' => DocumentController::class,
    'doc_templates' => DocTemplateController::class,
    'doc_fields' => DocFieldController::class,

]);

// Route::group(['middleware' => 'api','prefix' => 'auth'], function () {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
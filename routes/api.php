<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocTemplateController;

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
 
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Route::group(
//     [
//         'middleware' => 'auth:sanctum',
//     ],
//     static fn () =>
//     Route::apiResources([ 
//             'docs' => DocumentController::class,
//             'doctemplates' => DocTemplateController::class,
//     ])
// );

Route::apiResources([
    'docs' => DocumentController::class,
    'doctemplates' => DocTemplateController::class,
]); 

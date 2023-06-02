<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocTemplateController;
 
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
    'doc_templates' => DocTemplateController::class,
]); 

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/doc_configurator', function () { 
    return view('doc_configurator');
});

Route::get('demortfshow/{doc}', [DocumentController::class, 'show'])->name('doc.show');

Route::post('/getrtf', [DocumentController::class, 'getRTF']);

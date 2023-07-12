<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\ConstructorController;
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

Route::get(
    '/doc_configurator',
    [ConstructorController::class, 'index']
    // function () { 
//     return view('doc_configurator');
// }
)->name('doc_configurator');


Route::get('/doc_demo', function () { 
    return view('doc_demo');
});

Route::get('/demortfshow/{doc}', [DocumentController::class, 'demoshow'])->name('doc.demoshow');

Route::post('/getrtf', [DocumentController::class, 'getRTF']);
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

// TODO структурировать и выделить методы эдитора в модель док-конструктора Constructor 
Route::get('/doc_configurator', [DocumentController::class, 'webconfig']  )->name('doc_configurator');
Route::get('/doc_configurator/{doc}', [DocumentController::class, 'webconfig'])->name('doc_configurator');
Route::get('/doc_demo/{doc}', [DocumentController::class, 'webdemo'])->name('doc_demo'); 
Route::any('/doc_list', [DocumentController::class, 'weball'])->name('doc_list');
Route::post('/doc/create', [DocumentController::class, 'create'])->name('doc.create');

Route::any('/test-image-upload', [DocumentController::class, 'imageUpload'])->name('image.upload');

Route::get('/demortfshow/{doc}', [DocumentController::class, 'demoshow'])->name('doc.demoshow');
Route::post('/getrtf', [DocumentController::class, 'getRTF']);

 

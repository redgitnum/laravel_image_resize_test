<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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
    return view('image');
});

Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
Route::get('/process/{image}', [ImageController::class, 'options'])->name('image.options')->where('image', '.*');;
Route::post('/process/{image}', [ImageController::class, 'process'])->name('image.process')->where('image', '.*');;

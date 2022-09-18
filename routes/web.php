<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\VideoController;
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
})->name('main');

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/Video', [App\Http\Controllers\VideoController::class, 'VideoSubmit']);
Route::post('/Warning', [App\Http\Controllers\HomeController::class, 'IndexWarning'])->name('warning');
Route::post('/Comm', [App\Http\Controllers\VideoController::class, 'CommentsSubmit'])->name('Comment');
Route::get('/Watch/{slug}', [App\Http\Controllers\VideoController::class, 'IndexWatch'])->name('watch');
Route::post('/Appraisal', [App\Http\Controllers\HomeController::class, 'IndexAppraisal'])->name('appraisal');



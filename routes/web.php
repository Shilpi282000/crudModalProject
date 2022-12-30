<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[DataController::class,'insert']);
Route::post('/store',[DataController::class,'store']);
Route::get('/add',[DataController::class,'show']);
// Route::get('/show',[ModalController::class,'show']);
Route::get('/delete/{id}',[DataController::class,'delete']);
Route::get('/edit/{id}',[DataController::class,'edit']);
Route::post('/update/{id}',[DataController::class,'update']);
Route::get('/status/{id}',[DataController::class,'Status']);
Route::get('/anydata',[DataController::class,'anyData']);

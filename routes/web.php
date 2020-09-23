<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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


//Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/', [HomeController::class, 'index']);

Route::get('creat', [HomeController::class, 'creat']);
Route::post('creat', [HomeController::class, 'store']);

Route::get('delete/{id}',[HomeController::class, 'delete']);

Route::get('edit/{id}',[HomeController::class, 'edit']);
Route::post('update/{id}',[HomeController::class, 'update']);

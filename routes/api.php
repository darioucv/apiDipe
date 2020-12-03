<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\DiseasesController; //para hacer uso de funciones dentro del controller
//use App\Http\Controllers\DiseasesController;
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

//Route::resource('diseases', 'DiseaseController',['only' => ['index']]);
//Route::get('projects', [ProjectController::class, 'getAllProjects']); ////para hacer uso de funciones dentro del controller
//envio de datos
Route::get('/diseases', 'DiseaseController@diseasesList');
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
Route::get('diseases', 'DiseaseController@diseasesList');
Route::get('causes', 'CauseController@CauseList');
Route::get('categories', 'CategoryDiseaseController@CategoryDiseasesList');
Route::get('recommendations', 'RecommendationController@RecommendationList');
Route::get('symptoms', 'SymptomController@SymptomList');

Route::resource('listCauseDisease','ListCauseByDiseaseController');
Route::resource('listRecommendationDisease','ListRecommendationByDiseaseController');
Route::resource('listSymptomDisease','ListSymptomByDiseaseController');



Route::get('diseases/{fileName}','DiseaseController@returnImages');
Route::get('categories/{fileName}','CategoryDiseaseController@returnImages');
Route::get('recommendations/{fileName}','RecommendationController@returnImages');

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Disease;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RelationController;

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

Route::get('/', [PageController::class, 'getAllDiseases']);
Route::get('disease/{disease_id}', [PageController::class, 'getDisease'])->name('disease');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* CRUD */
Route::resource('diseases', 'DiseaseController')
->middleware('auth')
->except('show');

Route::resource('categories', 'CategoryDiseaseController')
->middleware('auth')
->except('show');

Route::resource('symptoms', 'SymptomController')
->middleware('auth')
->except('show');

Route::resource('causes', 'CauseController')
->middleware('auth')
->except('show');

Route::resource('recommendations', 'RecommendationController')
->middleware('auth')
->except('show');
/* relations */
Route::get('relations', [RelationController::class, 'diseasesList'])->middleware('auth');
Route::get('createCausesDisease/{disease_id}', [RelationController::class, 'createCausesDisease'])->middleware('auth');
Route::get('createSymptomsDisease/{disease_id}', [RelationController::class, 'createSymptomsDisease'])->middleware('auth');
Route::get('createRecommendationsDisease/{disease_id}', [RelationController::class, 'createRecommendationsDisease'])->middleware('auth');
/* save Relations */
Route::post('saveCausesDisease', [RelationController::class, 'saveCausesDisease'])->middleware('auth');
Route::post('saveSymptomsDisease', [RelationController::class, 'saveSymptomsDisease'])->middleware('auth');
Route::post('saveRecommendationsDisease', [RelationController::class, 'saveRecommendationsDisease'])->middleware('auth');


Route::resource('users', 'UserController')
->middleware('auth')
->except('show');


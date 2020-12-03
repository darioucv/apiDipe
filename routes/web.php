<?php

use Illuminate\Support\Facades\Route;
use App\Models\Disease;
use App\Http\Controllers\PageController;

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

Route::resource('diseases', 'DiseaseController')
->middleware('auth')
->except('show');

Route::get('welcome', function () {
    return view('welcome');
});


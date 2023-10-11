<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/stagiaire/list', [StagiaireController::class, 'index'])->name('stagiaires.index');
Route::get('/stagiaire/create', [StagiaireController::class, 'create'])->name('stagiaires.create');
Route::post('/stagiaire', [StagiaireController::class, 'store'])->name('stagiaires.store');
Route::get('/stagiaire/edit/{id}', [StagiaireController::class, 'edit'])->name('stagiaires.edit');
Route::post('/search-stagiaire', [StagiaireController::class, 'searchStagiaire'])->name('search');
Route::put('/stagiaire/update/{id}', [StagiaireController::class, 'update'])->name('stagiaires.update');
Route::post('/stagiaire/liste/{id}', [StagiaireController::class, 'delete'])->name('stagiaires.delete');










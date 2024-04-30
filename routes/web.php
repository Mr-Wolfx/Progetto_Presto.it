<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

// Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::prefix('article')->group(function(){
    Route::get('/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');

});



Route::prefix('category')->group(function(){
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

});

//* Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//* Accetta Annuncio
Route::patch('/accetta/annuncio/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');

//* Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');

//* Richiesta diventa revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('revisor.become');


//* Rotta per inviare la mail 
Route::post('/richiesta/revisore/inviata',[AdminController::class, 'send_email'])->name('send_email');

//* Rotta per rendere revisore
Route::get('/rendi/revisore/{user}', [AdminController::class, 'makeRevisor'])->name('make.revisor');

//*Rotta per la ricerca
Route::get('/ricerca/articoli', [FrontController::class, 'searchArticles'])->name('articles.search');

// //rotta per le lingue
 Route::post('/lingua{lang}',[FrontController::class,'setLanguage'])->name('setlocale');

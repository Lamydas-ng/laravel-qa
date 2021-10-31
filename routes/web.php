<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VoteQuestionController;
use App\Http\Controllers\VoteAnswerController;

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

Route::get('/', [App\Http\Controllers\QuestionsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/questions', App\Http\Controllers\QuestionsController::class)->except('show');
Route::get('/questions/{slug}', [App\Http\Controllers\QuestionsController::class,'show'])->name('questions.show');
//Auth::routes();
//Route::post('/questions/{question}/answers', [App\Http\Controllers\AnswersController::class,'store'])->name('questions.answers.store');
Route::resource('questions.answers', App\Http\Controllers\AnswersController::class)->only(['store','edit','update','destroy']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/answers/{answer}/accept', App\Http\Controllers\AcceptAnswerController::class)->name('answers.accept');

Route::post('/questions/{question}/favorites', [App\Http\Controllers\FavoritesController::class,'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites', [App\Http\Controllers\FavoritesController::class,'destroy'])->name('questions.unfavorite');

Route::post('/questions/{question}/vote', VoteQuestionController::class);
Route::post('/answers/{answer}/vote', VoteAnswerController::class);

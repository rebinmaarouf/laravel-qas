<?php

use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\FavoritesControllerd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\VoteAnswerController;
use App\Http\Controllers\VoteQuestionController;

Route::get('/', [QuestionsController::class, 'index']);

// Route::get('logout', function () {
//     auth()->logout();
//     Session()->flush();

//     return Redirect::to('/');
// })->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class)->except('show');
Route::resource('questions.answers', AnswersController::class)->except(['index', 'create', 'show']);
Route::get('/questions/{slug}', [QuestionsController::class, 'show'])->name('questions.show');
Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');
Route::post('/questions/{question}/favorites', [FavoritesControllerd::class, 'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites', [FavoritesControllerd::class, 'destroy'])->name('questions.unfavorite');

Route::post('/questions/{question}/vote', VoteQuestionController::class)->name('questions.vote');
Route::post('/answers/{answer}/vote', VoteAnswerController::class);

// Route::get('questions/create', [QuestionsController::class, 'create'])->name('questions.create');

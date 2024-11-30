<?php

use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\AnswersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\QuestionsController;

Route::get('/', function () {
    return view('welcome');
});

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
// Route::get('questions/create', [QuestionsController::class, 'create'])->name('questions.create');

<?php

use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class);
// Route::get('question/{id}/show', [QuestionsController::class, 'show'])->name('question.show');

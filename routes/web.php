<?php

use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class)->except('show');
Route::get('/questions/{slug}', [QuestionsController::class, 'show'])->name('questions.show');
// Route::get('questions/create', [QuestionsController::class, 'create'])->name('questions.create');

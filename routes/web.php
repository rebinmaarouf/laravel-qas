<?php

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
Route::get('/questions/{slug}', [QuestionsController::class, 'show'])->name('questions.show');
// Route::get('questions/create', [QuestionsController::class, 'create'])->name('questions.create');

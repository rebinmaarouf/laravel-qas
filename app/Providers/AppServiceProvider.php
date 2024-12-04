<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Question;
use App\Policies\AnswerPolicy;
use App\Policies\Questionpolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();

        Route::bind('slug', function ($slug) {
            // return $question = Question::with(['answers.user', 'answers' => function ($query) {
            //     $query->orderBy('votes_count', 'DESC');
            // }])->where('slug', $slug)->first() ?? abort(404);
            return $question = Question::with('answers.user')->where('slug', $slug)->first() ?? abort(404);
        });

        Gate::policy(Question::class, Questionpolicy::class);
        Gate::policy(Answer::class, AnswerPolicy::class);
    }
}

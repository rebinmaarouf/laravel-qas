@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="body-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>{{ $question->title }}</h1>
                                <div class="ms-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">back to all
                                        Questions</a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="media">
                            <div class="float-start vote-controls">
                                <a href="" title="This question is useful" class="vote-up">
                                    <i class="fas fa-caret-up fa-2x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a href="" title="This question is not useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-2x"></i>
                                </a>
                                <a href="" title="Click to mark as favorite question (Click again to undo)"
                                    class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}"
                                    onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit();">
                                    <i class="fas fa-star fa-2x"></i>
                                    <span class="favorites-count">{{ $question->favorites_count }}</span>
                                </a>
                                <form action="/questions/{{ $question->id }}/favorites" method="POST"
                                    id="favorite-question-{{ $question->id }}" style="display: none">
                                    @csrf
                                    @if ($question->is_favorited)
                                        @method('DELETE')
                                    @endif
                                </form>
                            </div>
                            <div class="media-body">
                                {!! $question->body_html !!}

                                <div class="d-flex justify-content-end">
                                    <div class="media">
                                        <span class="text-muted">Answered {{ $question->created_date }}</span>
                                        <div class="media-body d-flex justify-center">
                                            <a href="{{ $question->user->url }}" class="pe-2"><img
                                                    src="{{ $question->user->avatar }}" alt="" srcset=""></a>
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ])
    @include('answers._create')
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ms-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                        @foreach ($questions as $question)
                            <div class="media">
                                <div class="float-start counters">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong>{{ Str::plural('vote', $question->votes) }}
                                    </div>

                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answer }}</strong>{{ Str::plural('answer', $question->answer) }}
                                    </div>

                                    <div class="views">
                                        {{ $question->views . ' ' . Str::plural('views', $question->views) }}
                                    </div>
                                </div>

                                <div class="media-body float-none">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                        <div class="ms-auto">
                                            <a href="{{ route('questions.edit', $question->id) }}"
                                                class="btn btn-sm btn-outline-info">Edit</a>
                                        </div>

                                    </div>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    {{ Str::limit($question->body, 250) }}

                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="pagination justify-content-center">

                            {{ $questions->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

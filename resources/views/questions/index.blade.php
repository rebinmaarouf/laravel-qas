@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Questions</div>

                    <div class="card-body">
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

                                <div class="float-none">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
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

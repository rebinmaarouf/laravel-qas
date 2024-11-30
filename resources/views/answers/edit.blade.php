@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Editing answer for question: <strong>{{ $question->title }}</strong></h2>
                        </div>
                        <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="post">

                            @method('PUT')
                            @include('answers._form', ['buttonText' => 'Edit Answer'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

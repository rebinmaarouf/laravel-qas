@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Ask Questions</h2>
                            <div class="ms-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">back to all
                                    Questions</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="post">
                            @csrf
                            <div form-group>
                                <label for="question-title">Question Title</label>
                                <input type="text" name="title"
                                    class="form-control{{ $errors->has('title') ? 'is-invalid' : '' }}" id="question-title">
                                @if ($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div form-group>
                                <label for="question-body">Explan your question</label>
                                <textarea type="text" name="body" rows ="10"
                                    class="form-control{{ $errors->has('body') ? 'is-invalid' : '' }}" id="question-body"></textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div form-group>
                                <button type="submit" class="btn btn-outline-primary btn-lg mt-2">Ask this
                                    question</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

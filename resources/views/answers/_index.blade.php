    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . ' ' . Str::plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>
                @include('layouts._message')

                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="float-start vote-controls">
                            <a href="" title="This answer is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-1x"></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a href="" title="This answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-1x"></i>
                            </a>
                            <a href="" title="mark this answer as best answer" class="vote-accepted mt-2">
                                <i class="fas fa-check fa-1x"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ms-auto">
                                        @can('update', $answer)
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                                class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete', $answer)
                                            <form
                                                action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                                method="post" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <div class="media">
                                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                        <div class="media-body d-flex justify-center">
                                            <a href="{{ $answer->user->url }}" class="pe-2"><img
                                                    src="{{ $answer->user->avatar }}" alt="" srcset=""></a>
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>

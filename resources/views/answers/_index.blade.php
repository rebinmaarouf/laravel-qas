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
                            <div class="d-flex justify-content-end">
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
                    <hr>
                @endforeach
            </div>

        </div>
    </div>

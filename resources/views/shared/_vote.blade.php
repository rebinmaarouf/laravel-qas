@if ($model instanceof App\Models\Question)
    @php
        $name = 'question';
        $firstURLSegment = 'questions';
    @endphp
@elseif($model instanceof App\Models\Answer)
    @php
        $name = 'answer';
        $firstURLSegment = 'answers';
    @endphp
@endif
@php
    $formId = $name . '-' . $model->id;
    $formAction = "/{$firstURLSegment}/{$model->id}/vote";
@endphp
<div class="float-start vote-controls">
    <a href="" title="This {{ $name }} is useful" class="vote-up{{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-up fa-2x"></i>
    </a>
    <form action="{{ $formAction }}" method="POST" id="up-vote-{{ $formId }}" style="display: none">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a href="" title="This {{ $name }} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form action="{{ $formAction }}" method="POST" id="down-vote-{{ $formId }}" style="display: none">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>
    @if ($model instanceof App\Models\Question)
        @include('shared._favorite', [
            'model' => $model,
        ])
    @elseif($model instanceof App\Models\Answer)
        @include('shared.accept', [
            'model' => $model,
        ])
    @endif
</div>

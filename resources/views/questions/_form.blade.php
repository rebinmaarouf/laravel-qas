@csrf
<div form-group>
    <label for="question-title">Question Title</label>
    <input type="text" name="title" value="{{ old('title', $question->title) }}"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="question-title">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<div form-group>
    <label for="question-body">Explan your question</label>
    <textarea type="text" name="body" rows ="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
        id="question-body">{{ old('body', $question->body) }}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<div form-group>
    <button type="submit" class="btn btn-outline-primary btn-lg mt-2">{{ $buttonText }}</button>
</div>

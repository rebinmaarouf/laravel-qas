@csrf
<div form-group>
    <textarea type="text" name="body" rows ="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
        id="answer-body">{{ old('body', $answer->body) }}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<div form-group>
    <button type="submit" class="btn btn-outline-primary btn-lg mt-2">{{ $buttonText }}</button>
</div>

@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
        value="{{ old('title', $question->title) }}">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="body">Your question</label>
    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3">{{ old('body', $question->title) }}
    </textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
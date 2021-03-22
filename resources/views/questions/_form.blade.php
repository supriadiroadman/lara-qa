@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
        value="{{ isset($question) ? old('title') ?? $question->title : old('title') }}">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="body">Your question</label>
    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3">{{isset($question) ? old('body') ?? $question->body : old('body')}}
    </textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
@extends('layouts.app')

@section('content')
<div class="row ml-3 mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-light">

                <h3> Editing answer for question ({{ $question->title }})</h3>

                <form action="{{ route('questions.answers.update', [$question, $answer]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <textarea class="form-control bg-light @error('body') is-invalid @enderror" name="body"
                            rows="3">
                        {{ old('body') ?? $answer->body }}
                    </textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-success">
                    <div class="d-flex justify-content-between">
                        <h3> Ask Questions</h3>
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-light">
                            Back to all Question
                        </a>
                    </div>
                </div>

                <div class="card-body bg-light">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Your question</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                                rows="3">{{ old('body') }}
                            </textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Ask this Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-success">
                    <div class="d-flex justify-content-between">
                        <h3> All Questions</h3>
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-light">
                            Ask Question
                        </a>
                    </div>
                </div>

                <div class="card-body bg-light">
                    @include('layouts._flash-message')
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="mr-5 text-center">
                            <div class="mb-2">
                                <h4 class="mb-0 font-weight-bold">{{ $question->votes }}</h4>
                                <p>{{ Str::plural('vote', $question->votes) }}</p>
                            </div>
                            <div class="p-3 mb-3{{ $question->status }}">
                                <h4 class="mb-0 font-weight-bold">{{ $question->answers }}</h4>
                                <div>{{ Str::plural('answer', $question->answers) }}</div>
                            </div>
                            <div class="text-muted">
                                {{ $question->views." ". \Str::plural('view', $question->views) }}</div>
                        </div>

                        <div class="media-body">
                            <h4 class="mt-0"><a href="{{ $question->url }}">{{$question->title}}</a></h4>
                            Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            <small class="text-muted">{{ $question->created_date }}</small>
                            <p class="lead mt-3">{{ Str::words($question->body, 50, '...') }}</p>
                        </div>

                        <div class="ml-4 d-flex align-self-end">
                            <a href="{{ route('questions.edit', $question) }}"
                                class="btn btn-outline-success mr-1">Edit</a>
                            <form action="{{ route('questions.destroy', $question) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure ?')">Delete</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="d-flex justify-content-end">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
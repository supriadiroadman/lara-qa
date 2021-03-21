@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-success">All Questions</div>

                <div class="card-body bg-light">
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
                        {{-- <img src="..." class="mr-3" alt="..."> --}}
                        <div class="media-body">
                            <h4 class="mt-0"><a href="{{ $question->url }}">{{$question->title}}</a></h4>
                            Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            <small class="text-muted">{{ $question->created_date }}</small>
                            <p class="lead mt-3">{{ Str::words($question->body, 50, '...') }}</p>
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
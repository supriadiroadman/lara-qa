@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">

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
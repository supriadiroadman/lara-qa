@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-success">
                    <div class="d-flex justify-content-between">
                        <h2>{{ $question->title }}</h2>
                        <div>
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-light text-nowrap">
                                Back to all Question
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body bg-light">
                    <div class="media mb-4">
                        <a href="{{ $question->user->url }}" class="mr-3">
                            <img src="{{ $question->user->avatar }}">
                        </a>
                        <div class="media-body">
                            <h5 class="my-0">
                                <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            </h5>
                            <small class="text-muted mt-0"> {{ $question->created_date }}</small>
                        </div>
                    </div>

                    <div class="media">
                        <div class="d-flex flex-column text-center mr-4">
                            <a title="This question is usefull" class="text-dark mb-1" role="button">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="h4 my-0">1230</span>

                            <a title="This question is not usefull" class="text-secondary mb-2" role="button">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <a title="Click to mark as favorite question (CLick again to undo)" class="text-success"
                                role="button">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="d-block">123</span>
                            </a>

                        </div>
                        <div class="media-body mt-2">
                            {{-- {!! parsedown($question->body) !!} --}}
                            {!! $question->body_html !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('answers._index')
    @include('answers._create')
</div>
@endsection
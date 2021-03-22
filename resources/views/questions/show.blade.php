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
                    {{-- {!!$question->body!!} --}}
                    {!! parsedown($question->body) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
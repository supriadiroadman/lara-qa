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
                        @include('questions._form', ['buttonText' => 'Ask this Question'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
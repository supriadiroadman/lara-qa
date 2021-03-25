<div class="row ml-3 mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-light">
                <div class="card-title">
                    <h2>
                        {{ $question->answers_count. " ". Str::plural('Answer', $question->answers_count)}}
                    </h2>
                </div>
                <hr>
                @include('layouts._flash-message')

                @foreach ($question->answers as $answer)
                <div class="media">
                    <div class="media-body">
                        <div class="media mb-4">
                            <a href="{{ $answer->user->url }}" class="mr-3">
                                <img src="{{ $answer->user->avatar }}">
                            </a>
                            <div class="media-body">
                                <h5 class="my-0">
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </h5>
                                <small class="text-muted mt-0">Answered {{ $answer->created_date }}</small>
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

                                <a title="Mark this answer as best answer" class="mt-2 {{ $answer->status }}"
                                    role="button">
                                    <i class="fas fa-check fa-2x"></i>
                                </a>

                            </div>
                            <div class="media-body mt-2">
                                {{-- {!! parsedown($question->body) !!} --}}
                                {!! $answer->body_html !!}
                            </div>
                        </div>
                    </div>


                    <div class="ml-4 d-flex align-self-end">
                        @can('update', $answer)
                        <a href="{{ route('questions.answers.edit',[$question, $answer]) }}"
                            class="btn btn-outline-success mr-1">Edit
                        </a>
                        @endcan

                        @can('delete', $answer)
                        <form action="{{ route('questions.answers.destroy',[$question, $answer]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"
                                onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                        @endcan
                    </div>

                </div>
                <hr>
                @endforeach

            </div>
        </div>
    </div>
</div>
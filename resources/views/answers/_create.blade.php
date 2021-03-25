<div class="row ml-3 mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-light">
                <h3 class="card-title">Your Answer</h3>
                <hr>

                <form action="{{ route('questions.answers.store', $question) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control bg-light @error('body') is-invalid @enderror" name="body"
                            rows="3">
                            {{ old('body') }}
                        </textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
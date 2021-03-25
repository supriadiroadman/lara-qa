<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        // $answer->question->best_answer_id = $answer->id;
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}

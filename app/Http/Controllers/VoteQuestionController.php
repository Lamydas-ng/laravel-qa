<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class VoteQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Question $question)
    {
        $vote = (int) request()->vote;
        $user = User::findOrFail(auth()->id());
        $votesCount = $user->voteAnswer($question, $vote);
        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Thanks for the feedback',
                'votesCount' => $votesCount
            ]);
        }
        return back();
    }
}

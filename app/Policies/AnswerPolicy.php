<?php

namespace App\Policies;

use App\User;
use App\Answer;
use App\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }
    public function checkowner(User $user, Question $question, Answer $answer)
    {
        return $user->id === $answer->user_id;
        return $question->id === $answer->question_id;
    }
    
}
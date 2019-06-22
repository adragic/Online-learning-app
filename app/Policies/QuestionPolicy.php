<?php

namespace App\Policies;

use App\User;
use App\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
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
    public function destroy(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }
    public function checkowner(User $user, Question $question)
    {
        return $user->id === $question->user_id;
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Answer;
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
    public function destroy(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }
    public function checkowner(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }
}
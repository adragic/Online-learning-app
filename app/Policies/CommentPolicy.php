<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
    public function destroy(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
    public function checkowner(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}

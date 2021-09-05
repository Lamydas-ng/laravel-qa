<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
    * Determine whether the user can update the answer.
    *
    * @param  \App\User  $user
    * @param  \App\Answer  $answer
    * @return mixed
    */
    public function update(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

     public function accept(User $user, Answer $answer)
    {
        return $user->id === $answer->question->user_id;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\answer  $answer
     * @return mixed
     */
    public function delete(User $user, answer $answer)
    {
        return $user->id === $answer->user_id;
    }
}

<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessTodoPolicy
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

    /**
     * Check if a todo belongs to the user
     *
     * @param User $user
     * @param Todo $todo
     * @return bool
     */
    public function access(User $user , Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }
}

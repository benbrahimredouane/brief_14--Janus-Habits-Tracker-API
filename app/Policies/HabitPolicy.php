<?php

namespace App\Policies;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HabitPolicy
{
    /**
     * Check if the user can view the habit.
     */
    public function view(User $user, Habit $habit): Response
    {
        return $user->id === $habit->user_id
            ? Response::allow()
            : Response::deny('You do not own this habit.');
    }

    /**
     * Check if the user can modify the habit.
     */
    public function modify(User $user, Habit $habit): Response
    {
        return $user->id === $habit->user_id
            ? Response::allow()
            : Response::deny('You do not own this habit.');
    }
}
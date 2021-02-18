<?php

namespace App\Policies;

use App\Meeting;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user, Meeting $meeting)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Meeting $meeting)
    {
        return (int) $user->id === (int) $meeting->user_id;
    }

    public function delete(User $user, Meeting $meeting)
    {
        return $user->id === $meeting->user_id;
    }
}

<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('manage users');
    }

    public function create(User $user): bool
    {
        return $user->can('manage users');
    }

    public function update(User $user): bool
    {
        return $user->can('manage users');
    }

    public function delete(User $user): bool
    {
        return $user->can('manage users');
    }
}


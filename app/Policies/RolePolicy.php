<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function create(User $user)
    {
        return true;
    }
}

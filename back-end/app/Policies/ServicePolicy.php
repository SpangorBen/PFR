<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    public function manage(User $user)
    {
        $role = $user->role;
        if ($role) {
            return $role->name === Role::OWNER || $role->name === Role::STAFF || ($role->name === Role::WORKER && $user->company_id === NULL);
        }
        return false;
    }
}

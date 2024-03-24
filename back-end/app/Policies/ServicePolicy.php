<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    public function manage(User $user)
    {
        return $user->role === 'staff' || $user->role === 'owner' || ($user->role === 'worker' && $user->company_id === null);
    }
}

<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
  public function view($roles_code,User $user)
  {
    return $user->role->roles_code === $roles_code;
  }
}

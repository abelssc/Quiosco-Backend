<?php

namespace App\Policies;

use App\Models\User;

class BasePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }
    public function isAdmin(User $user): bool
    {
        return $user->rol === 'admin';
    }
    // Autorizar las acciones de creación
    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    // Autorizar las acciones de actualización
    public function update(User $user)
    {
        return $this->isAdmin($user);
    }

    // Autorizar las acciones de eliminación
    public function delete(User $user)
    {
        return $this->isAdmin($user);
    }
}

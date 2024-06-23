<?php

namespace App\Policies;

use App\Models\Calculation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalculationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Calculation $calculation): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Calculation $calculation): bool
    {
        return true;
    }

    public function delete(User $user, Calculation $calculation): bool
    {
        return true;
    }

    public function restore(User $user, Calculation $calculation): bool
    {
        return true;
    }

    public function forceDelete(User $user, Calculation $calculation): bool
    {
        return true;
    }
}

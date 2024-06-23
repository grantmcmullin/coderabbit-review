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

    }

    public function view(User $user, Calculation $calculation): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Calculation $calculation): bool
    {
    }

    public function delete(User $user, Calculation $calculation): bool
    {
    }

    public function restore(User $user, Calculation $calculation): bool
    {
    }

    public function forceDelete(User $user, Calculation $calculation): bool
    {
    }
}

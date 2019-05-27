<?php

namespace App\Policies;

use App\User;
use App\Tenancy;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenancyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the tenancy.
     *
     * @param  \App\User  $user
     * @param  \App\Tenancy  $tenancy
     * @return mixed
     */
    public function view(User $user, Tenancy $tenancy)
    {
        return $tenancy->user_id == $user->id;
    }

    /**
     * Determine whether the user can create tenancies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tenancy.
     *
     * @param  \App\User  $user
     * @param  \App\Tenancy  $tenancy
     * @return mixed
     */
    public function update(User $user, Tenancy $tenancy)
    {
        return $tenancy->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the tenancy.
     *
     * @param  \App\User  $user
     * @param  \App\Tenancy  $tenancy
     * @return mixed
     */
    public function delete(User $user, Tenancy $tenancy)
    {
        //
    }

    /**
     * Determine whether the user can restore the tenancy.
     *
     * @param  \App\User  $user
     * @param  \App\Tenancy  $tenancy
     * @return mixed
     */
    public function restore(User $user, Tenancy $tenancy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tenancy.
     *
     * @param  \App\User  $user
     * @param  \App\Tenancy  $tenancy
     * @return mixed
     */
    public function forceDelete(User $user, Tenancy $tenancy)
    {
        //
    }
}

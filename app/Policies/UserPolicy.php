<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy 
 * ---- 
 * Gate Authorzations for the user management in the application. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $authUser  Database entity from the authenticated user.
     * @param  User  $dbUser    Database entity from the database fetched user.
     * @return bool
     */
    public function delete(User $authUser, User $dbUser): bool
    {
        return $authUser->hasRole('admin') || $authUser->id === $dbUser->id;
    }
}

<?php 

namespace App\Repositories;

use App\User;
use App\Models\Concern;
use App\Notifications\AssignedUserNotification;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class ConcernRepository
 *
 * @package App\Repositories
 */
class ConcernRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Concern::class;
    }

    /**
     * Notify the user that is assigned to the privacy concern ticket. 
     * 
     * @param  null|int $userId The unique identifier from the user in the database.
     * @return void
     */
    public function notifyAssignedUser(?int $userId): void  
    {
        if (! empty($userId)) {
            $user = User::findOrFail($userId);
            $user->notify(new notifyAssignedUser($user))->delay(now()->addMinute());
        }
    }
}
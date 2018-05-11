<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Spatie\Activitylog\Models\Activity;

/**
 * Class ActivityRepository
 *
 * @package App\Repositories
 */
class ActivityRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Activity::class;
    }
    
    /**
     * Write an activity log to the database
     *
     * @param  mixed  $model   The model instance where the activity happend on.
     * @param  string $message The message that needs to be logged
     * @param  string $log     The log name where the activity needs to be recorded.
     * @return void
     */
    public function registerActivity($model, string $message, string $log = 'default'): void
    {
        $user = auth()->user();
        activity($log)->performedOn($model)->causedBy($user)->log($message);
    }
}
<?php 

namespace App\Repositories;

use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Spatie\Permission\Models\Role;

/**
 * Class UsersRepository
 *
 * @package App\Repositories
 */
class UsersRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Method for creating a new user for each ACL role (seeder)
     *
     * @param  Role  $role       Database entity for the given ACL role.
     * @param  mixed $commandBus Mapping for the laravel seeder command bus.
     * @return void
     */
    public function seedCreateUser(Role $role, $commandBus): void
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);

        if ($role->name === 'admin') {
            $commandBus->info('Here are your admin details to login!');
            $commandBus->warn($user->email);
            $commandBus->warn('Password is "secret"');
        }
    }


    /**
     * Method for getting the data from a user out off the database.
     *
     * @param  int|null $userId The unique identifier from the user. Default toid from authenticated user.
     * @return User
     */
    public function getUser(?int $userId = null): User
    {
        $userId = is_null($userId) ? auth()->user()->id : $userId;
        return $this->findOrFail($userId, ['name', 'email']);
    }
}
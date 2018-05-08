<?php 

namespace App\Repositories;

use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Spatie\Permission\Models\Role;
use RuntimeException;

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
        $user = factory(User::class)->create(['password' => 'secret']);
        $user->assignRole($role->name);

        if ($role->name === 'admin') {
            $commandBus->info('Here are your admin details to login!');
            $commandBus->warn($user->email);
            $commandBus->warn('Password is "secret"');
        }
    }

    /**
     * Get all the users for a given ACL role. 
     * 
     * @param  string $type   The output identifier for the database results.
     * @param  string $name   The name from the ACL role. 
     * @param  array  $fields The database results u want to use further in your application.
     * @return Collection|array
     */
    public function getUsersByRole(string $type = 'get', string $name, array $fields = ['*'])
    {
        $baseQuery = $this->model->role($name);

        switch ($type) { // Identify the result output form the database.
            case 'get':     return $baseQuery->get($fields);
            case 'array':   return $baseQuery->get($fields)->toArray($fields); 

            // No valid option has been given so we run some exception. 
            // With debugging message.
            default: throw new RuntimeException('Type can only be "get" or "array"');
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
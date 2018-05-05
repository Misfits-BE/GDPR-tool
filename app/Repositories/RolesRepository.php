<?php 

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class RolesRepository
 *
 * @package App\Repositories
 */
class RolesRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Role::class;
    }

    /**
     * Create a new role in the application when there is no role found with the given name.
     * ----
     * This function also extends the Eloquent ORM -> firstOrCreate() method.
     *
     * @param  array $role The given role data in array form.
     * @return Role
     */
    public function firstOrCreate(array $role): Role
    {
        return $this->model->firstOrCreate($role);
    }
}
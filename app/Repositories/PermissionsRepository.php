<?php 

namespace App\Repositories;

use App\Models\Permission;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class PermissionsRepository
 *
 * @package App\Repositories
 */
class PermissionsRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Permission::class;
    }
}
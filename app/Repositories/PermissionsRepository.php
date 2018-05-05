<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;
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

    /**
     * Get only the read access roles out of the database.
     *
     * @return Collection
     */
    public function getReadPermissions(): Collection
    {
        return $this->model->where('name', 'LIKE', 'view_%')->get();
    }

}
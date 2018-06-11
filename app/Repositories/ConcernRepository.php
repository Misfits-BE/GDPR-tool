<?php 

namespace App\Repositories;

use App\Models\Concern;
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
}
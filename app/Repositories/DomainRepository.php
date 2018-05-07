<?php 

namespace App\Repositories;

use App\Models\Domain;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class DomainRepository
 *
 * @package App\Repositories
 */
class DomainRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Domain::class;
    }
}
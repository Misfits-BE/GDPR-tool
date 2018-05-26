<?php 

namespace App\Repositories;

use App\Models\Support;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class SupportRepository
 *
 * @package App\Repositories
 */
class SupportRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Support::class;
    }
}
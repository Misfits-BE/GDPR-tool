<?php 

namespace App\Repositories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Get the first 5 high prior domains for the admin dashboard. 
     * 
     * @return Collection
     */
    public function getDashboardResults(): Collection
    {
        return $this->entity()->withCount(['concerns' => function ($query): void {
            $query->where('is_open', true);
        }])->orderBy('concerns_count', 'desc')->take(6)->get();
    }
}
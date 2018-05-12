<?php 

namespace App\Repositories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
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

    /**
     * Get the all the domains from the database storage in paginated form. 
     * 
     * @param  null|string  $domain     The search term form the search box. If no data is given it returns null.
     * @param  int          $perPage    The amount of results u want to display per page.
     * @return Paginator
     */
    public function getDomains(?string $domain, int $perPage): Paginator
    {
        if (is_null($domain)) {
            return $this->simplePaginate($perPage);
        }

        return $this->model->where('name', 'LIKE', "%{$domain}%")->orWhere('url', 'LIKE', "%{$domain}%")->simplePaginate(15);
    }
}
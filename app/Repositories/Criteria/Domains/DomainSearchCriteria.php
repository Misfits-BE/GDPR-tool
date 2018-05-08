<?php 

namespace App\Repositories\Criteria\Domains; 

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class DomainSearchCriteria
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Repositories\Criteria\Domains
 */
class DomainSearchCriteria extends Criteria 
{
    /** @var string $term The variable for the user given search term. */
    protected $term; 

    /**
     * DomainSearchCriteria Constructor 
     * 
     * @param  string $term The user given term where the search needs to perform on. 
     * @return void
     */
    public function __construct(string $term)
    {
        $this->term = $term;
    }
    
    /**
     * The Eloquent builder instance that needs to be apply on the parent instance. 
     *
     * @param                       $model      The Eloquent database model where the criterie should applied on.
     * @param RepositoryInterface   $repository The interface from the repository class.
     *
     * @return Builder
     */
    public function apply($model, RepositoryInterface $repository): Builder
    {
        return $model->where('name', 'LIKE', "%{$input->term}%")
            ->orWhere('url', 'LIKE', "%{$input->term}%");
    }
}
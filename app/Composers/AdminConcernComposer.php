<?php 

namespace App\Composers; 

use Illuminate\Contracts\Auth\Guard;
use Illuminate\View\View; 
use App\Repositories\ConcernRepository;

/**
 * Class AdminConcernComposer 
 * ----
 * The view composer for the admin index listing that is needed for the privacy concerns. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Composers
 */
class AdminConcernComposer
{
    /** @var \Illuminate\Contracts\Auth\Guard $auth */
    protected $auth; 

    /** @var \App\Repositories\ConcernRepository $concernRepository */
    private $concernRepository;

    /**
     * Create a new composer layout constructor 
     * 
     * @param  Guard             $auth              The authentication guard instance
     * @param  ConcernRepository $concernRepository The abstraction layer between composer and DB table. 
     * @return void
     */
    public function __construct(Guard $auth, ConcernRepository $concernRepository) 
    {
        $this->auth = $auth; 
        $this->concernRepository = $concernRepository;
    }

    /**
     * Bind data to the view 
     * 
     * @param  View $view The view instance. 
     * @return void 
     */
    public function compose(View $view): void 
    {
        $dbInstance = $this->concernRepository->entity(); 

        $view->with('assignedCount',    $dbInstance->assigned()->count());
        $view->with('openCount',        $dbInstance->open()->count());
        $view->with('createdCount',     $dbInstance->ownConcerns()->count());
    }
}
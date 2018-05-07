<?php

namespace App\Http\Controllers;

use App\Repositories\DomainRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class DomainController
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class DomainController extends Controller
{
    /** @var DomainRepository $domainRepository The variable for the domain abstraction layer. */
    private $domainRepository; 

    /**
     * DomainController constructor 
     * 
     * @param  DomainRepository $domainRepository The abstraction layer between database and controller (MySQL: Domains)
     * @return void
     */
    public function __construct(DomainRepository $domainRepository)
    {
        $this->middleware(['role:auth']); 
        $this->domainRepository = $domainRepository;
    }

    /**
     * Get the index view for all the domains in the application. 
     * 
     * @return View
     */
    public function index(): View
    {
        //
    }

    public function create(): View
    {

    }

    public function store(): RedirectResponse
    {
        
    }
}

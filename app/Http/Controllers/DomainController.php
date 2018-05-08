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
        $this->middleware(['auth', 'role:admin']); 
        $this->domainRepository = $domainRepository;
    }

    /**
     * Get the index view for all the domains in the application. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('domains.index', [
            'domains' => $this->domainRepository->with(['dpo'])->all()
        ]);
    }

    /**
     * Display the application view for creating a new domain in the application. 
     * 
     * @return View
     */
    public function create(): View
    {
        return view('domains.create');
    }

    /**
     * Store the new project domain in the database.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        //
    }

    /**
     * Show a specific domain in the application;
     *
     * @param  int $domain The unique identifier from the domain in the database.
     * @return View
     */
    public function show(int $domain)
    {

    }
}

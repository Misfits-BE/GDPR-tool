<?php

namespace App\Http\Controllers;

use App\Repositories\DomainRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\Criteria\Domains\DomainSearchCriteria;
use App\Repositories\UsersRepository;
use App\Http\Requests\Domains\Web\CreateValidator;
use App\Repositories\ActivityRepository;
use Toastr;

/**
 * Class DomainController
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class DomainController extends Controller
{
    /** @var DomainRepository $domainRepository The variable for the domain abstraction layer. (MySQL: domains) */
    private $domainRepository; 

    /** @var UsersRepository $userRepository The variable for the users abstraction layer. (MySQL: users) */
    private $userRepository; 

    /** @var ActivityRepository $activityRepository The variable for the logs abstraction layer. (MySQL: activity_log) */
    private $activityRepository;

    /**
     * DomainController constructor 
     * 
     * @param  DomainRepository   $domainRepository     The abstraction layer between database and controller (MySQL: Domains)
     * @param  UsersRepository    $usersRepository      The abstraction layer between database and controller (MySQL: users)
     * @param  ActivityRepository $activityRepository   The abstraction layer between database and controller (MySQL: activity_log)
     * @return void
     */
    public function __construct(DomainRepository $domainRepository, UsersRepository $userRepository, ActivityRepository $activityRepository)
    {
        $this->middleware(['auth', 'role:admin']); 

        $this->userRepository     = $userRepository;
        $this->domainRepository   = $domainRepository;
        $this->activityRepository = $activityRepository;
    }

    /**
     * Get the index view for all the domains in the application. 
     * 
     * @return View
     */
    public function index(Request $input): View
    {
        if (! is_null($input->term)) { 
            //! The term is not empty so the user tries to performs a search on the domains table
            $this->domainRepository->applyCriteria(new DomainSearchCriteria($input->term));
        }

        $domains = $this->domainRepository->with(['dpo', 'concerns'])->simplePaginate(15); 
        $term    = $input->term;

        return view('domains.index', compact('domains', 'term'));
    }

    /**
     * Display the application view for creating a new domain in the application. 
     * 
     * @return View
     */
    public function create(): View
    {
        $term = null; // When a user search for a domain he will redirected to the domain index page. 
        $dpos = $this->userRepository->getUsersByRole('get', 'admin', ['id', 'name', 'email']);
        
        return view('domains.create', compact('term', 'dpos'));
    }

    /**
     * Store the new project domain in the database.
     *
     * @todo Implement phpunit test
     * 
     * @param  CreateValidator $input The validator for the given user input. 
     * @return RedirectResponse
     */
    public function store(CreateValidator $input): RedirectResponse
    {
        if ($domain = $this->domainRepository->create($input->all())) {
            $this->activityRepository->registerActivity($domain, __('domains.activity.store', ['name' => $domain->name]));
            Toastr::success("The domain '{$domain->name} has been saved.'", 'Domain created.');
        }

        return redirect()->route('domains.show', $domain);
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

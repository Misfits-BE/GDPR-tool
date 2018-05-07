<?php

namespace App\Http\Controllers;

use App\Repositories\DomainRepository;
use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class HomeController extends Controller
{
    /** @var DomainRepository $domainRepository Variable for the domain abstraction layer. (MySQL: Domains) */
    private $domainRepository;

    /**
     * Create a new controller instance.
     *
     * @param   DomainRepository $domainRepository Abstraction layer between database and controller (MySQL: Domains)
     * @return void
     */
    public function __construct(DomainRepository $domainRepository)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->domainRepository = $domainRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home', ['domains' => $this->domainRepository->getDashboardresults()]);
    }
}

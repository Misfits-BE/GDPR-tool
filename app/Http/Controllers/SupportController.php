<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SupportRepository;

/**
 * Class SupportController
 * ---- 
 * The class for the user support in the application. 
 * 
 * @author      Tim Joosten 
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class SupportController extends Controller
{
    /** @var SupportRespository $supportRepository The variable for the support database lauer. (MySQL: supports) */
    private $supportRepository;

    /**
     * SupportController constructor 
     * 
     * @param  SupportRepository $supportRepository The abstraction layer for all the support realted questions.
     * @return void
     */
    public function __construct(SupportRepository $supportRepository)
    {
        $this->middleware(['auth']);
        $this->supportRepository = $supportRepository;
    }

    /**
     * The index view for all the user support questions.
     * 
     * @todo Implement phpunit
     * @todo Implement route
     * 
     * @return View
     */
    public function index(): View 
    {
        
    }

    /**
     * Store the new support question in our database. 
     * 
     * @todo Implement phpunit 
     * @todo Register route
     * 
     * @return RedirectReponse
     */
    public function store(): RedirectResponse
    {
        return redirect()->route('user.support.index');
    }

    /**
     * @return View
     */
    public function show(): View 
    {

    }
}

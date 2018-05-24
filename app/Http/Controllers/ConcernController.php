<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class ConcernController
 * ---- 
 * Get the controller for all the privacy concerns. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class ConcernController extends Controller
{
    /**
     * Get the admin index page for all the privacy concerns. 
     * 
     * @todo Implement phpunit 
     * @todo Implement the view.
     * 
     * @return view
     */
    public function index(): View 
    {
        return view('concerns.admin.index');
    }

    /**
     * Get the rceate view for a new privacy concern. (Backend)
     * 
     * @todo Implement phpunit
     * @todo Implement view
     * 
     * @return View 
     */
    public function create(): View 
    {
        return view('concerns.shared.create');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\UsersRepository;

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
     * @todo Implement the created, assigned, open param.
     * @todo Set counters to global view composer.
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
     * @param  UsersRepository $userRepository The abstraction layer between controller and users DB table. 
     * @return View 
     */
    public function create(UsersRepository $userRepository): View 
    {
        return view('concerns.shared.create', ['admins' => $userRepository->getUsersByRole('get', 'admin')]);
    }
}

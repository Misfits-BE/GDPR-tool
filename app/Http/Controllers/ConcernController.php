<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Repositories\{ConcernRepository, UsersRepository};
use Illuminate\Http\Response;
use App\Http\Requests\Concerns\CreateValidator;
use App\Repositories\DomainRepository;

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
     * @param  UsersRepository  $userRepository     The abstraction layer between controller and users DB table. 
     * @param  DomainRepository $domainRepository   The abstraction layer between controller and domain repositories.
     * @return View 
     */
    public function create(UsersRepository $userRepository, DomainRepository $domainRepository): View 
    {
        return view('concerns.shared.create', [
            'admins'  => $userRepository->getUsersByRole('get', 'admin'), 
            'domains' => $domainRepository->all()
        ]);
    }

    /**
     * Store the privacy concern in the database storage
     * 
     * @todo implement route
     * @todo Implement phpunit route
     * @todo Build up the validation
     * 
     * @param  CreateValidator   $input             The request class for validating the input data
     * @param  ConcernRepository $concernRepository The abstraction for concerns bewteen controller and database.
     * @return RedirectResponse
     */
    public function store(CreateValidator $input, ConcernRepository $concernRepository): RedirectResponse 
    {
        $input->merge(['author_id' => $input->user()->id]); 

        if ($concernRepository->create($input->all())) { // Privacy concern is saved in the storage
            $concernRepository->notifyAssignedUser($input->assignee_id); //! BUILD function
            
            switch (auth()->check()) {
                case true:  break;
                case false: break; 
            }
        }

        return back(Response::HTTP_FOUND); // Code 302
    }
}

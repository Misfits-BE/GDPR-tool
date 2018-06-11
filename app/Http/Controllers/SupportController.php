<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SupportRepository;
use App\Http\Requests\Support\CreateValidator;
use App\Repositories\ActivityRepository;

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
    /** @var SupportRespository $supportRepository The variable for the support database later. (MySQL: supports) */
    private $supportRepository;

    /** @var ActivityRepository $activityRepository The variable for the activity log layer (MySQL: activity_log) */
    private $activityRepository; 

    /**
     * SupportController constructor 
     * 
     * @param  SupportRepository  $supportRepository  The abstraction layer for all the support related questions.
     * @param  ActivityRepository $activityRepository The abstraction layer for all the activity related logic.
     * @return void
     */
    public function __construct(SupportRepository $supportRepository, ActivityRepository $activityRepository)
    {
        $this->middleware(['auth']);
        
        $this->activityRepository = $activityRepository; 
        $this->supportRepository  = $supportRepository;
    }

    /**
     * The index view for all the user support questions.
     * 
     * @todo Implement phpunit
     * @todo Build up the application view.
     * 
     * @return View
     */
    public function index(): View 
    {
        $view = auth()->user()->hasRole('admin') ? 'admin': 'frontend';
        return view("support.index-{$view}");
    }

    /**
     * Store the new support question in our database. 
     * 
     * @todo Register validation form request
     * @todo Build up controller
     * @todo Implement phpunit 
     * @todo Register route
     * 
     * @param  CreateValidator $input The form request class that validates the user given input.
     * @return RedirectReponse
     */
    public function store(CreateValidator $input): RedirectResponse
    {
        $input->merge(['author_id' => $input->user()->id]);

        if ($ticket = $this->supportRepository->create($input->all())) {
            $this->activityRepository->registerActivity($ticket, __('support.activities.store', ['title' => $ticket->title])); 
            // TODO: Implement toastr
        }

        return redirect()->route('user.support.index');
    }

    /**
     * Show a specific support ticket in the application. 
     * 
     * @todo Implement route
     * @todo Build up view
     * @todo Build up phpunit test 
     * 
     * @param  int $identifier The unique identification from the ticket in the application.
     * @return View
     */
    public function show(int $identifier): View 
    {
        return view('support.show', ['ticket' => $this->supportRepository->findOrFail($identifier)]);
    }

    /**
     * Method for closing a support ticket in the application.
     * 
     * @todo Build up controller
     * @todo Implement phpunit
     * @todo register route
     * 
     * @param  int    $identifier The unique identification from the support ticket in the application. 
     * @param  string $status     The status for the ticket that needs to be stored.
     * @return RedirectResponse
     */
    public function close(int $identifier, string $status): RedirectResponse
    {
        $ticket = $this->supportRepository->findOrFail($identifier);

        if ($this->supportRepository->changeStatus($ticket, $status)) {
            // TODO: implement toaster
            // TODO Implement activity loggers
        }

        return redirect()->route('support.index');
    }
}

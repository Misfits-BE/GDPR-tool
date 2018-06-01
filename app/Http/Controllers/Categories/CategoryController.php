<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Categories\CreateValidator;
use App\Repositories\ActivityRepository;
use Brian2694\Toastr\Facades\Toastr;

/**
 * Class IndexController 
 * ---- 
 * The controller for the privacy categories. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers\Categories
 */
class CategoryController extends Controller
{
    /** @var CategoryRepository $categoryRepository The variable for the category abstraction layer (MySQL: Categories) */
    private $categoryRepository; 

    /** @var ActivityRepository $activityRepository The variable for the activities abstraction layer (MySQL: activity_log) */
    private $activityRepository;

    /**
     * CategoryController constructor 
     * 
     * @param  CategoryRepository $categoryRepository The category abstraction layer between database and controller.
     * @param  ActivityRepository $activityRepository The activity abstraction layer between database and controller. 
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository, ActivityRepository $activityRepository)
    {
        $this->middleware(['auth', 'role:admin']);

        $this->categoryRepository = $categoryRepository;
        $this->activityRepository = $activityRepository;
    }

    /**
     * Get the index page for the privacy Categories
     * 
     * @todo Implement phpunit 
     * @todo Build up the application view
     * @todo Implement search method 
     * 
     * @return View
     */
    public function index(): View 
    {
        return view('categories.index', ['categories' => $this->categoryRepository->simplePaginate(20)]);
    }

    /**
     * Create view for a new privacy category in the application. 
     * 
     * @todo Register the route
     * 
     * @return View
     */
    public function create(): View 
    {
        return view('categories.create');
    }

    /**
     * Store a new privacy category in the database storage. 
     * 
     * @param  CreateValidator The form request class for input validation. 
     * @return RedirectResponse
     */
    public function store(CreateValidator $input): RedirectResponse 
    {
        $input->merge(['author_id' => $input->user()->id, 'module' => 'privacy']); 

        if ($category = $this->categoryRepository->create($input->all())) {
            $this->activityRepository->registerActivity($category, __('categories.activity.store', [
                'title' => $category->title, 'module' => $category->module
            ]));
            
            Toastr::success( //! Notification message
                __('categories.toastr.store.message', ['title' => $category->title, 'module' => $category->module]), 
                __('categories.toastr.store.title')
            );
        }

        return redirect()->route('privacy.categories.index');
    }
}

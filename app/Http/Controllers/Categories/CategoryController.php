<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

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
    /** @var CategoryRepository $categoryRepository The variablem for the category abstraction layer (MySQL: Categories) */
    private $categoryRepository; 

    /**
     * CategoryController constructor 
     * 
     * @param  CategoryRepository $categoryRepository The category abstraction layer between database and controller.
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->categoryRepository = $categoryRepository;
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
        return view('categories.index');
    }

    /**
     * Create view for a new privacy category in the application. 
     * 
     * @todo Implement phpunit 
     * @todo Build up the view. 
     * @todo Register the route
     * 
     * @return View
     */
    public function create(): View 
    {
        return view('categories.create');
    }
}
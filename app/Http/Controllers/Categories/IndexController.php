<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
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
class IndexController extends Controller
{
    /** @var  */
    private $categoryRepository; 

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth', 'role:admin');
        $this->categoryRepository = $categoryRepository;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Class WelcomeController
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * The application welcome page. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('auth.login');
    }
}

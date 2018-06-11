<?php

namespace App\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\View\View;
use App\Repositories\UsersRepository;

/**
 * Class GlobalComposer
 * ----
 * The view composer that applies to all the application views.
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Composers
 */
class GlobalComposer
{
    /** @var \Illuminate\Contracts\Auth\Guard $auth  */
    protected $auth;

    /** @var UserRepository $userRepository Variable for the database abstraction layer (MySQL: users) */
    private $userRepository;
    
    /**
     * Create a new global layout composer.
     *
     * @param  Guard          $auth             The authentication guard.
     * @param  UserRepository $userRepository   The abstraction for the users table. (MySQL: users)
     * @return void
     */
    public function __construct(Guard $auth, UsersRepository $userRepository)
    {
        $this->auth           = $auth;
        $this->userRepository = $userRepository;
    }
    
    /**
     * Bind data to the view
     *
     * @param  View $view The view builder instance.
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('currentUser', $this->auth->user()); // Global variable for the authenticated user data
        $view->with('countUsers',  $this->userRepository->entity()->count()); // Global variable for the users count in the app.
    }
}
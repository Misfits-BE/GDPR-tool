<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class UsersController
 * ----
 * Controller for the user management in our ACL databases.
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers
 */
class UsersController extends Controller
{
    /** @var UsersRepository $usersRepository The abstraction layer variable (MySQL: users) */
    private $usersRepository;

    /**
     * UsersController constructor.
     *
     * @param  UsersRepository $usersRepository
     * @return void
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->usersRepository = $usersRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => $this->usersRepository->simplePaginate(15, ['name', 'email', 'created_at'])
        ]);
    }
}

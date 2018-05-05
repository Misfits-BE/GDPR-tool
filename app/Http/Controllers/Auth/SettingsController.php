<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class SettingsController
 * ----
 * Controller for all the account settings
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Controllers\Auth
 */
class SettingsController extends Controller
{
    /** @var UsersRepository $usersRepository Variable for the abstraction layer on the MySQL users table. */
    private $usersRepository;

    /**
     * SettingsController constructor.
     *
     * @param  UsersRepository $usersRepository The abstraction layer for the MySQL users table.
     * @return void
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->middleware(['auth']);
        $this->usersRepository = $usersRepository;
    }

    /**
     * Get the index page for the account settings
     *
     * @return View
     */
    public function index(): View
    {
        $user = $this->usersRepository->getUser();
        return view('account-settings.index', compact('user'));
    }
}

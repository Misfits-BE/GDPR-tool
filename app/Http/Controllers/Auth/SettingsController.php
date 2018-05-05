<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\Auth\Settings\InformationValidator;
use Symfony\Component\HttpFoundation\Response;
use Toastr;
use App\Http\Requests\Auth\Settings\SecurityValidator;

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
     * ----
     * Defaults account settings route points to the account information page
     *
     * @return View
     */
    public function index(): View
    {
        $user = $this->usersRepository->getUser();
        return view('account-settings.information', compact('user'));
    }

    public function formSecurity()
    {
        return view('account-settings.password');
    }

    /**
     * Method for updating the account information. (authenticated user)
     * 
     * @param  InformationValidator $input Validation for the given user input.
     * @return RedirectResponse
     */
    public function updateInformation(InformationValidator $input): RedirectResponse
    {
        if ($this->usersRepository->getUser()->update($input->except('_token', '_method'))) {
            Toastr::success('Your account information has been updated.', 'Account updated!');
        }

        return back(Response::HTTP_FOUND);
    }

    /**
     * @return RedirectResponse
     */
    public function updateSecurity(SecurityValidator $input): RedirectResponse 
    {

    }
}

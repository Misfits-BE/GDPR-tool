<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use App\Http\Requests\Users\UserValidator;
use App\Repositories\RolesRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

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

    /** @var RolesRepository $rolesRepoistory The role abstraction layer variables (MySQL: roles) */
    private $rolesRepository;

    /**
     * UsersController constructor.
     *
     * @param  UsersRepository $usersRepository The abstraction layer between controller and database. 
     * @param  RolesRepository $rolesRepository The abstraction layer between controller and database.
     * @return void
     */
    public function __construct(UsersRepository $usersRepository, RolesRepository $rolesRepository)
    {
        $this->middleware(['auth', 'role:admin'])->except(['destroy']);
        $this->middleware(['auth'])->only(['destroy']);

        $this->usersRepository  = $usersRepository;
        $this->rolesRepository  = $rolesRepository;
    }

    /**
     * Get the index page for the user management console. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => $this->usersRepository->simplePaginate(15, ['name', 'email', 'created_at'])
        ]);
    }

    /**
     * View for creating a new user in the application. 
     * 
     * @return View
     */
    public function create(): View 
    {
        return view('users.create', [
            'roles' => $this->rolesRepository->all(['name'])
        ]); 
    }

    /**
     * Store a new user in the application. 
     * 
     * @todo Implement phpunit test
     * 
     * @param  UserValidator $input The given user validator.
     * @return RedirectResponse
     */
    public function store(UserValidator $input): RedirectResponse 
    {
        $input->merge(['password' => str_random(15), 'name' => "{$input->firstname} {$input->lastname}"]);

        if ($user = $this->usersRepository->create($input->all())) {
            $user->assignRole($input->role);

            Toastr::success("The account for {$user->name} has been created.", 'Account created.');
        }

        return redirect()->route('users.index', [], Response::HTTP_FOUND); // Code: 302
    }

    /**
     * Method for destroying a user in the application. 
     * 
     * @param  int $user The unique identifier from the user in the database.
     * @return RedirectResponse
     */
    public function destroy(int $user): RedirectResponse
    {
        $user = $this->usersRepository->findOrFail($user); 

        if ($user->delete()) {
            //
        }

        return back(Response::HTTP_FOUND); // Code: 302
    }
}

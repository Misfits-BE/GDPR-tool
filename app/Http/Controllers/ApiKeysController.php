<?php

namespace App\Http\Controllers;

use App\Repositories\ApiKeyRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\ApiKeyValidator;
use Toastr;

/**
 * Class ApiKeysController
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package App\Http\Controllers
 */
class ApiKeysController extends Controller
{
    /** @var ApiKeyRepository $apikeysRepository The variable for the abstraction layer (MySQL: api_keys) */
    private $apikeysRepository;

    /**
     * ApiKeysController constructor.
     *
     * @param  ApiKeyRepository $apikeysRepository The abstraction layer for the database abstraction layer.
     * @return void
     */
    public function __construct(ApiKeyRepository $apikeysRepository)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->apikeysRepository = $apikeysRepository; 
    }

    /**
     * Get the index management console page for the api keys.
     *
     * @return View
     */
    public function index(): View
    {
        $authUser = auth()->user();
        return view('apikeys.index', ['apikeys' => $authUser->apiKeys()->simplePaginate(10)]);
    }

    /**
     * Controller for registering a new api token in the application. 
     * 
     * @todo Register activity logger
     * 
     * @param  ApiKeyValidator $input The validation class for the form inputs
     * @return RedirectResponse
     */
    public function store(ApiKeyValidator $input): RedirectResponse
    {
        if ($this->apikeysRepository->registerApiKey($input)) {
            // TODO: Replace toastr with a flash session. 
            Toastr::success("The api for the service <strong>{$input->service}</strong> has been created.", 'API key created!');
        }

        return redirect()->route('apikeys.index');
    }

    public function generate(): RedirectResponse
    {

    }

    public function destroy(): RedirectResponse
    {
        
    }
}

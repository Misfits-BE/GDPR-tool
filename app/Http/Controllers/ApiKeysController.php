<?php

namespace App\Http\Controllers;

use App\Repositories\ApiKeyRepository;
use Illuminate\View\View;

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
     * @param  ApiKeyRepository $apikeysRepository The abstraction layer for the the database abstraction layer.
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
        return view('apikeys.index');
    }
}

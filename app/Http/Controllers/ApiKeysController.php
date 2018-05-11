<?php

namespace App\Http\Controllers;

use App\Repositories\ApiKeyRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\ApiKeyValidator;
use Mpociot\Reanimate\ReanimateModels;
use App\Repositories\ActivityRepository;

/**
 * Class ApiKeysController
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package App\Http\Controllers
 */
class ApiKeysController extends Controller
{
    use ReanimateModels; // Trait ReanimateModels is need for undo a key delete when needed.

    /** @var ApiKeyRepository $apikeysRepository The variable for the abstraction layer (MySQL: api_keys) */
    private $apikeysRepository;

    /** @var ActivityRepository $activityRepository The variable for the abstraction layer (MySQL: actibity_log) */
    private $activityRepository;

    /**
     * ApiKeysController constructor.
     *
     * @param  ApiKeyRepository   $apikeysRepository    The abstraction layer for the database abstraction layer.
     * @param  ActivityRepository $activityRepository   The abstraction layer for the activity database abstraction layer. 
     * @return void
     */
    public function __construct(ApiKeyRepository $apikeysRepository, ActivityRepository $activityRepository)
    {
        $this->middleware(['auth', 'role:admin']);

        $this->apikeysRepository  = $apikeysRepository; 
        $this->activityRepository = $activityRepository;
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
     * Controller for registering a new API token in the application. 
     * 
     * @param  ApiKeyValidator $input The validation class for the form inputs
     * @return RedirectResponse
     */
    public function store(ApiKeyValidator $input): RedirectResponse
    {
        if ($apikey = $this->apikeysRepository->registerApiKey($input)) {
            $flash = $this->apikeysRepository->flashOutput(
                __('apikeys.flash.store-title'), __('apikeys.flash.store-message', ['name' => $apikey->service])
            );

            $this->activityRepository->registerActivity($apikey, __('apikeys.activity.create'));
        }

        return redirect()->route('apikeys.index')->with($flash);
    }

    /**
     * Delete some api key in the application. 
     * 
     * @param  int $apikey  The unique identifier from the key in the database storage.
     * @return RedirectResponse
     */
    public function destroy(int $apikey): RedirectResponse
    {
        $apikey = $this->apikeysRepository->findOrFail($apikey); 
        
        if ($apikey->delete()) { // The API key has been deleted.
            $undoFlash = $this->undoFlash($apikey, "api-tokens/undo/{$apikey->id}");
            $msgFlash  = $this->apikeysRepository->flashOutput(
                __('apikeys.flash.delete-title'), __('apikeys.flash.delete-message', ['name' => $apikey->service])
            );

            $this->activityRepository->registerActivity($apikey, __('apikeys.activity.delete'));
        } 

        return redirect()->route('apikeys.index')->with($msgFlash)->with($undoFlash);
    }

    /**
     * Regenerate a new API key for the existing service.
     *
     * @param  int $apikey  The unique identifier from the key in the database storage.
     * @return RedirectResponse
     */
    public function regenerate(int $apikey): RedirectResponse
    {
        $apikey = $this->apikeysRepository->findOrFail($apikey);
        $newkey = $this->apikeysRepository->regenerateKey();

        if ($apikey->update(['key' => $newkey])) {
            $keyFlash = ['key' => $newkey];
            $msgFlash = $this->apikeysRepository->flashOutput(
                __('apikeys.flash.regenerate-title'), __('apikeys.flash.regenerate-message', ['name' => $apikey->service])
            );

            $this->activityRepository->registerActivity($apikey, __('apikeys.activity.regenerate'));
        }

        return redirect()->route('apikeys.index')->with(array_merge($keyFlash, $msgFlash));
    }

    /**
     * Revert the deleted api key. 
     * 
     * @todo Implement activity logger
     * 
     * @param  int $apikey  The unique identifier from the key in the database storage.
     * @return RedirectResponse
     */
    public function undo(int $apikey): RedirectResponse
    {
        //
    }
}

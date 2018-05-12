<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Misfits\ApiGuard\Models\ApiKey;
use App\Http\Requests\Auth\ApiKeyValidator;

/**
 * Class ApiKeyRepository
 *
 * @package App\Repositories
 */
class ApiKeyRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Apikey::class;
    }

    /**
     * Method for registering a new API key in the platform. 
     * 
     * @param  ApiKeyValidator $input The given user output out off the form. 
     * @return ApiKey 
     */
    public function registerApiKey(ApiKeyValidator $input): ApiKey
    {
        if ($apiKey = auth()->user()->createApiKey()) {
            $apiKey->update(['service' => $input->service]);

            //! $apikey method not chained becasue maybe on later basis,  
            //! we need to send notifications to the user.

            return $apiKey;
        }
    }

    /**
     * Formatter for the flash message data
     * 
     * @param  string $title    The title for the flash session
     * @param  string $message  The message for the flash session
     * @param  string $level    The level for the flash session. Also known as CSS class default to success.
     * @return array
     */
    public function flashOutput(string $title, string $message, string $level = 'success'): array 
    {
        return ['flash-message' => ['level' => $level, 'title' => $title, 'content' => $message]];
    }

    public function regenerateKey()
    {
        return ApiKey::generateKey();
    }
}
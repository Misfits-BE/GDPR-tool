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

            return $apiKey;
        }
    }
}
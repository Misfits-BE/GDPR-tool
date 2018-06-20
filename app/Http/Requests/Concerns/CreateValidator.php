<?php

namespace App\Http\Requests\Concerns;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateValidator 
 * ---- 
 * Form request class for validting the input from a new privacy concern.
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Requests\Concerns
 */
class CreateValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool 
    {
        // No validation checks needed because the validator is for both authenticated
        // users and non authenticated users.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'     => 'required|string',
            'domain_id' => 'required|numeric',
            'concern'   => 'required',
        ];
    }
}

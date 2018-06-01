<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateValidator
 * -----
 * Form request validation for a new category in the application. 
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Requests\Categories
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
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:191', 
            'description' => 'required'
        ];
    }
}

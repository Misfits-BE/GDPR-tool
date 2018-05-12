<?php

namespace App\Http\Requests\Domains\Web;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateValidator 
 * ---- 
 * Validation class for storing a new domain in the application. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Http\Requests\Domains\Web
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
        return auth()->check() && auth()->user()->hasAnyRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'dpo_id' => 'required|numeric', 
            'name'   => 'required|string|max:191', 
            'url'    => 'required|max:191|unique:domains,url',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EnduserUpdatePasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules['password'] = ['required', ...$this->route('enduser')->getRules('password'), 'confirmed'];
        return $rules;
    }

    /**
     * Get the sanitization filters that apply to the request.
     *
     * @return array
     */
    public function filters()
    {
        $filters = [];
        $filters['password'] = [...$this->route('enduser')->getFilters('password')];
        return $filters;
    }
}

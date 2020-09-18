<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ClientUpdateRequest extends Request
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
        $rules['name'] = ['required', ...$this->route('client')->getRules('name')];
        $rules['email'] = ['required', ...$this->route('client')->getRules('email')];
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
        $filters['name'] = [...$this->route('client')->getFilters('name')];
        $filters['email'] = [...$this->route('client')->getFilters('email')];
        return $filters;
    }
}

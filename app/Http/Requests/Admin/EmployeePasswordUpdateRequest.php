<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EmployeePasswordUpdateRequest extends Request
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
        $rules['password'] = ['required', ...$this->route('employee')->getRules('password'), 'confirmed'];
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
        $filters['password'] = [...$this->route('employee')->getFilters('password')];
        return $filters;
    }
}

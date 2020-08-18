<?php

namespace App\Http\Requests\Admin;

use App\Models\Employee;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends Request
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
        $rules['name'] = ['required', ...$this->route('employee')->getRules('name')];
        $rules['email'] = ['required', ...$this->route('employee')->getRules('email')];
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
        $filters['name'] = [...$this->route('employee')->getFilters('name')];
        $filters['email'] = [...$this->route('employee')->getFilters('email')];
        return $filters;
    }
}

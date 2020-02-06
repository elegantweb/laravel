<?php

namespace App\Http\Requests\Admin;

use App\Models\Enduser;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class EnduserUpdateRequest extends Request
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
        $rules['name'] = ['required', ...$this->route('enduser')->getRules('name')];
        $rules['email'] = ['required', ...$this->route('enduser')->getRules('email')];
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
        $filters['name'] = [...$this->route('enduser')->getFilters('name')];
        $filters['email'] = [...$this->route('enduser')->getFilters('email')];
        return $filters;
    }
}

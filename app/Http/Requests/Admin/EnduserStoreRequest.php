<?php

namespace App\Http\Requests\Admin;

use App\Models\Enduser;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class EnduserStoreRequest extends Request
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
        $rules['name'] = ['required', ...Enduser::getRules('name')];
        $rules['email'] = ['required', ...Enduser::getRules('email')];
        $rules['password'] = ['required', ...Enduser::getRules('password'), 'confirmed'];
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
        $filters['name'] = [...Enduser::getFilters('name')];
        $filters['email'] = [...Enduser::getFilters('email')];
        $filters['password'] = [...Enduser::getFilters('password')];
        return $filters;
    }
}

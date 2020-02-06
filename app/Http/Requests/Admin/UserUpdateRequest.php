<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends Request
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
        $rules['name'] = ['required', ...$this->route('user')->getRules('name')];
        $rules['email'] = ['required', ...$this->route('user')->getRules('email')];
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
        $filters['name'] = [...$this->route('user')->getFilters('name')];
        $filters['email'] = [...$this->route('user')->getFilters('email')];
        return $filters;
    }
}

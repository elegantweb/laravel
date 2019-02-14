<?php

namespace App\Http\Requests\Admin\User;

use App\User;
use App\Http\Requests\Request;

class UpdateRequest extends FormRequest
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
        $rules['name'] = ['required', 'string', 'max_db_string'];
        $rules['email'] = ['required', 'email', 'max_db_string'];
        $rules['email'][] = Rule::unique((new User)->getTable())->ignore($this->route('user'));
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
        $filters['name'] = ['trim', 'capitalize', 'escape'];
        $filters['email'] = ['trim', 'lowercase'];
        return $filters;
    }
}

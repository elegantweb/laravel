<?php

namespace App\Admin\Clients\Requests;

use App\Domain\Clients\Client;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ClientStoreRequest extends Request
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
        $rules['name'] = ['required', ...(new Client())->getRules('name')];
        $rules['email'] = ['required', ...(new Client())->getRules('email')];
        $rules['password'] = ['required', ...(new Client())->getRules('password'), 'confirmed'];
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
        $filters['name'] = [...(new Client())->getFilters('name')];
        $filters['email'] = [...(new Client())->getFilters('email')];
        $filters['password'] = [...(new Client())->getFilters('password')];
        return $filters;
    }
}

<?php

namespace App\Http\Requests;

use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class Request extends FormRequest
{
    use SanitizesInput;

    public function withValidator(Validator $validator)
    {
        $validator->after([$this, 'after']);
    }

    public function after(Validator $validator)
    {
        // pass
    }
}

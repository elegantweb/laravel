<?php

namespace App\Models;

use Elegant\Common\Models\HasFormValidation;
use Elegant\Common\Models\HasFormSanitization;
use Illuminate\Validation\Rule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable, HasFormValidation, HasFormSanitization;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the global validation rules of the model.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules['name'] = ['string', 'max_db_string'];
        $rules['email'] = ['email', 'max_db_string'];
        if ($this->exists) $rules['email'][] = Rule::unique(self::class)->ignore($this);
        else $rules['email'][] = Rule::unique(self::class);
        $rules['password'] = ['string', 'min:8', 'max_db_string'];
        return $rules;
    }

    /**
     * Get the global sanitization filters of the model.
     *
     * @return array
     */
    public function filters()
    {
        $filters = [];
        $filters['name'] = ['trim', 'empty_string_to_null', 'capitalize'];
        $filters['email'] = ['trim', 'empty_string_to_null', 'lowercase'];
        return $filters;
    }
}

<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enduser extends Authenticatable
{
    use Notifiable;

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
     * @var array
     */
    protected $dates = [
        'disabled_at',
    ];

    /**
     * The universal validation rules of this model.
     *
     * @param  Enduser|null $user
     * @return array
     */
    public static function rules(Enduser $user = null)
    {
        $rules = [];
        $rules['name'] = ['required', 'string', 'max_db_string'];
        $rules['email'] = ['required', 'email', 'max_db_string'];
        if ($user) $rules['email'][] = Rule::unique('users')->ignore($user->id);
        else $rules['email'][] = Rule::unique('users');
        $rules['password'] = ['required', 'string', 'min:6', 'max_db_string', 'confirmed'];
        return $rules;
    }
}

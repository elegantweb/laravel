<?php

namespace App\Models;

use App\Notifications\UserResetPassword as ResetPasswordNotification;
use Illuminate\Validation\Rule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
     * The universal validation rules of this model.
     *
     * @param  User|null $user
     * @return array
     */
    public static function rules(self $user = null)
    {
        $rules = [];
        $rules['name'] = ['required', 'string', 'max_db_string'];
        $rules['email'] = ['required', 'email', 'max_db_string'];
        if ($user) $rules['email'][] = Rule::unique('users')->ignore($user->id);
        else $rules['email'][] = Rule::unique('users');
        $rules['password'] = ['required', 'string', 'min:6', 'max_db_string'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'nickname',
        'gender',
        'dob',
        'email',
        'password',
        'home_number',
        'mobile_number',
        'work_number',
        'address',
        'bio',
        'avatar',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

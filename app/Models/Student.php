<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        // user account credentials
        'username',
        'password',

        // identity
        'lastname',
        'firstname',
        'middlename',

        // personal information
        'date_of_birth',
        'gender',

        // contact information
        'email',
        'mobile_no',

        // address
        'address',

        // student information
        'section',
        'course'
    ];

    protected $hidden = [
        'remember_token',
        'password'
    ];
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'username',
        'email',
        'password',
        'gender',
        'role',
        'image'
    ];
}

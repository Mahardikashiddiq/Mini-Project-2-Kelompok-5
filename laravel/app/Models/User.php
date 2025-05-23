<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user'; // karena nama tabel kamu 'user', bukan 'users'
    protected $fillable = [
        'email', 'password', 'nama', 'address', 'bio', 'phone', 'profile_picture',
    ];
}


// user
// dian@gmail.com
// dian123

// nisa@gmail.com
// nisa123

// mahar@gmail.com
// mahardika

// riyan@gmail.com
// riyanhadi



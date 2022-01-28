<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserAdmin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'user_adm';

    protected $guarded = 'admin';

    protected $fillable = [
        'name', 'email', 'email_verified_at', 'create_at', 'update_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

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

    protected $primaryKey = 'manv';

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationship with Roles (Many to Many)
    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles','quyen_nhanvien','maquyen','manv');
    }

    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('manv', 'like', '%'.$key.'%','or','tennv', 'like', '%'.$key.'%');
        }
        return $q;
    }
}

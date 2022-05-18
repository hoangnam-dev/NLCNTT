<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'khachhang';
    protected $fillable = [
        'tenkh', 'sodienthoai', 'email', 'gioitinh', 'create_at', 'update_at', 'resetpass_token',
    ];

    protected $primaryKey = 'makh';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

/**
 * Get the user that owns the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function hasComment()
    {
        return $this->hasMany('App\Models\Comments', 'makh', 'makh');
    }

    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('makh', 'like', '%'.$key.'%','or','tenkh', 'like', '%'.$key.'%');
        }
        return $q;
    }
}

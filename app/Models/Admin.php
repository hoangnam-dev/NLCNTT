<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    // public $timestamps = false;
    protected $table = 'nhanvien'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    protected $guarded = 'admin';
    
    protected $fillable = [
        'tennv', 'sodienthoai', 'email', 'gioitinh', 'create_at', 'update_at',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $primaryKey = 'manv'; // nếu tên khóa là id thì có thể không khai báo

}

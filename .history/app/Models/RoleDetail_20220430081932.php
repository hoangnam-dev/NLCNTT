<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'manv','maquyen'
    ];
    public $incrementing = false; 
    protected $table = 'quyen_nhanvien'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Roles
    public function hasRole(){
        return $this->hasOne('App\Models\Roles', 'maquyen', 'manv');
    }
    // Relationship with UserAdmin
    public function hasUserAdmin(){
        return $this->belongsTo('App\Models\UserAdmin', 'manv', 'manv');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tenquyen', 'mota'
    ];
    protected $primaryKey = 'maquyen'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'roles'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with RoleDetail
    public function roleDetail(){
        return $this->hasMany('App\Models\RoleDetail', 'maquyen', 'makh');
    }
    
    // Relationship with UserAdmin (Many to Many)
    public function users()
    {
        return $this->belongsToMany(UserAdmin::class, 'quyen_nv', 'maquyen', 'makh');
    }

    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('maquyen', 'like', '%'.$key.'%', 'OR', 'tenquyen', 'like', '%'.$key.'%');
        }
        return $q;
    }
}

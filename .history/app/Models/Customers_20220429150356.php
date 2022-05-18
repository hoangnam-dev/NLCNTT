<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'tenkh','sodienthoai','email','password','gioitinh','create_at','update_at', 'resetpass_token'
    ];
    protected $primaryKey = 'makh'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'khachhang'; // nếu tên models trùng với tên table thì có thể không khai báo
    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('makh', 'like', '%'.$key.'%','or','tenkh', 'like', '%'.$key.'%');
        }
        return $q;
    }
}

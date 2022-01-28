<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = [
        'TenNV','SoDienThoai','Email','GioiTinh', 'Create_at', 'Update_at',
    ];
    protected $guarded = 'admin';
    protected $hidden = [
        'MatKhau', 'Remember_token',
    ];
    protected $primaryKey = 'MaNV'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'nhanvien'; // nếu tên models trùng với tên table thì có thể không khai báo

}

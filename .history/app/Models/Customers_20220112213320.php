<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'TenKH','SoDienThoai','Email','MatKhau','GioiTinh','NgayTao','NgaySua'
    ];
    protected $primaryKey = 'MaKH'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'khachhang'; // nếu tên models trùng với tên table thì có thể không khai báo
}

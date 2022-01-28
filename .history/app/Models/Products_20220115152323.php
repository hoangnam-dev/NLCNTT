<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'TenSP','SoLuong','GiaBan','Avatar','MoTa','NoiBat','TrangThai','XuatXu','NgayTao','NgaySua','MaDM','MaKM'
    ];
    protected $primaryKey = 'MaSP'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'sanpham'; // nếu tên models trùng với tên table thì có thể không khai báo

    // Relationship with Category
    public function hasCategory(){
        return $this->belongsTo('App\Models\Categories','MaDM','MaDM');
    }

    // Relationship with Category
    public function hasPromotion(){
        return $this->belongsTo('App\Models\Promotion','MaKM','MaKM');
    }
    // Relationship with ProductImages
    public function hasImages(){
        return $this->hasMany('App\Models\ProductImages');
    }

    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('TenSP', 'like', '%'.$key.'%');
        }
        return $q;
    }
    // globalScope
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'ngay_dh', 'diachi_gh','ngay_gh', 'tongtien','ghichu','trangthai','makh','manv'
    ];
    protected $primaryKey = 'madh'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'donhang'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with OrderDetail
    public function hasOrderDetail(){
        return $this->hasMany('App\Models\OrderDetail', 'madh', 'madh');
    }

    // Relationship with Products (Many to Many)
    public function products()
    {
        return $this->belongsToMany(Products::class, 'chitietdh', 'madh', 'masp');
    }
    
    // Relationship with User
    public function hasUser(){
        return $this->belongsTo('App\Models\User','makh','makh');
    }
    
    // Relationship with UserAdmin
    public function hasUserAdmin(){
        return $this->belongsTo('App\Models\UserAdmin','manv','manv');
    }
    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            // $key = "Nguyễn Hoàng Nam";
            // $q = $q->join('khachhang','donhang.makh','=','khachhang.makh')->where('madh', 'like', '%'.$key.'%','or','tenkh', 'like', '%'.$key.'%');
            $q = $q->join('khachhang','donhang.makh','=','khachhang.makh')->where('khachhang.tenkh', 'like', '%'.$key.'%','or','madh', 'like', '%'.$key.'%');
            // dd($q);
        }
        return $q;
    }
}

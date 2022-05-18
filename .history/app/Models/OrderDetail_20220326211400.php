<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'soluongmua','dongiaban'
    ];
    protected $primaryKey = ['madh', 'masp']; // voi nhung bang co nhieu khoa chinh
    public $incrementing = false; 
    protected $table = 'chitietdh'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Order and Products
    public function orderProduct(){
        return $this->hasOneThrough(Order::class, Products::class, 'madh', 'masp', 'madh', 'masp');
    }
    // Relationship with Order
    public function hasOrder(){
        return $this->hasOne('App\Models\Order', 'masp', 'masp');
    }
}
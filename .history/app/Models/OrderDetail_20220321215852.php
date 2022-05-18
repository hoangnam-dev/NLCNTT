<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'soluongmua','dongia'
    ];
    protected $primaryKey = ['madh', 'masp']; // voi nhung bang co nhieu khoa chinh
    public $incrementing = false; 
    protected $table = 'chitietdh'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Order
    public function hasOrder(){
        return $this->belongsTo('App\Models\Order','id_qh','id_qh');
    }
}

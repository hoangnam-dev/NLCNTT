<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'hinhanh','masp'
    ];
    protected $primaryKey = 'mahinh'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'hinhsanpham'; // nếu tên models trùng với tên table thì có thể không khai báo

    // Relationship with Product
    public function hasProduct(){
        return $this->belongsTo('App\Models\Products','masp','masp');
    }
}

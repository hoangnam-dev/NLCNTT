<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendm',
    ];
    protected $primaryKey = 'madm'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'danhmuc'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Products
    public function hasProducts(){
        return $this->hasMany('App\Models\Products', 'madm', 'madm');
    }
}

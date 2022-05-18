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
    // localScope
    public function scopeSearch($q) {
        if($key = request()->key) {
            $q = $q->where('madm', 'like', '%'.$key.'%','or','tendm', 'like', '%'.$key.'%');
        }
        return $q;
    }
}

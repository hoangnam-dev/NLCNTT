<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tenkm','giatri','ngaybd','ngaykt',
    ];
    protected $primaryKey = 'makm'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'khuyenmai'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Products
    public function hasProducts(){
        return $this->hasMany('App\Models\Products');
    }
}

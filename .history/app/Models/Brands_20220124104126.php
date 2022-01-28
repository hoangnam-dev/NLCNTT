<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'tenhang',
    ];
    protected $primaryKey = 'mahsx'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'hangsx'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Products
    public function hasProducts(){
        return $this->hasMany('App\Models\Products');
    }
}

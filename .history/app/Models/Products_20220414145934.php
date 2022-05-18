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
        'tensp','soluong','giaban','avata','mota','noibat','trangthoi','xuatxu','create_at','ngaytao','madm','makm', 'mahsx',
    ];
    protected $primaryKey = 'masp'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'sanpham'; // nếu tên models trùng với tên table thì có thể không khai báo

    // Relationship with Category
    public function hasCategory(){
        return $this->belongsTo('App\Models\Categories','madm','madm');
    }

    // Relationship with Brands
    public function hasBrands(){
        return $this->belongsTo('App\Models\Brands','mahsx','mahsx');
    }

    // Relationship with Promotion
    public function hasPromotion(){
        return $this->belongsTo('App\Models\Promotion','makm','makm');
    }

    // Relationship with ProductImages
    public function hasImages(){
        return $this->hasMany('App\Models\ProductImages');
    }

    // Relationship with ProductDetail
    public function hasDetail(){
        return $this->hasOne('App\Models\ProductDetail');
    }

     // Relationship with Order (Many to Many)
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

     // Relationship with Order (Many to Many)
    public function orderDT()
    {
        return $this->hasOne(OrderDetail::class);
    }

    // Relationship with Comment
    public function hasComments(){
        return $this->hasMany('App\Models\Comments');
    }

    // localScope
    public function scopeSearch($query) {
        if($key = request()->key) {
            $query = $query->where('tensp', 'like', '%'.$key.'%');
        }
        return $query;
    }
    // globalScope

    
}

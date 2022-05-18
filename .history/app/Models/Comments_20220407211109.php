<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'noidung', 'masp', 'makh', 'create_at', 'update_at'
    ];
    protected $primaryKey = 'mabl'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'binhluan'; // nếu tên models trùng với tên table thì có thể không khai báo

    public function hasUser()
    {
        return $this->belongsTo('App\Models\User', 'makh', 'makh');
    }

    public function hasProduct()
    {
        return $this->belongsTo('App\Models\Products', 'masp', 'masp');
    }

    // localScope
    public function scopeSearch($query) {
        if($key = request()->key) {
            $query = $query->where('tensp', 'like', '%'.$key.'%');
        }
        return $query;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'ten_xp','loai_xp','id_qh'
    ];
    protected $primaryKey = 'id_xp'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'xaphuong'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Districts
    public function hasDistricts(){
        return $this->belongsTo('App\Models\Districts','id_qh','id_qh');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'ten_qh','loai_qh','id_ttp'
    ];
    protected $primaryKey = 'id_qh'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'quanhuyen'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Wards
    public function hasWards(){
        return $this->hasMany('App\Models\Wards');
    }

    // Relationship with Cities
    public function hasCities(){
        return $this->belongsTo('App\Models\Cities','id_ttp','id_ttp');
    }
    
}

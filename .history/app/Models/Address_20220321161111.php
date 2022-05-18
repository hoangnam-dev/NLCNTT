<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'diachi','makh','id_xp'
    ];
    protected $primaryKey = 'madc'; // nếu tên khóa là id thì có thể không khai báo
    protected $table = 'diachi'; // nếu tên models trùng với tên table thì có thể không khai báo
    
    // Relationship with Users
    public function hasUsers(){
        return $this->hasMany('App\Models\Users');
    }

    // Relationship with UserAdmin
    public function hasUserAdmin(){
        return $this->hasMany('App\Models\UserAdmin');
    }

    // Relationship with Cities
    public function hasCities(){
        return $this->belongsTo('App\Models\Cities','id_ttp','id_ttp');
    }

}

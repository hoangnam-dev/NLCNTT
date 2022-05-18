<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'thuoctinh';
    protected $fillable = [
        'tentt',
    ];
    protected $primaryKey = 'matt';
    public function hasAttributeDetail()
    {
        return $this->hasMany('App\Models\AttributeDetail', 'matt', 'matt');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key) {
            $query->where('tentt', 'like', '%' . $key . '%', 'or', 'matt', 'like', '%' . $key . '%');
        }
        return $query;
    }
    
}

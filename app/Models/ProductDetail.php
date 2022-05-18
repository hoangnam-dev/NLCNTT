<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chitietsp';
    protected $fillable = [
        'masp',
        'matt',
        'giatritt',
    ];
    protected $primaryKey = 'id';
    
    public function hasProduct()
    {
        return $this->belongsTo('App\Models\Products', 'masp', 'masp');
    }
    
    public function hasAttribute() {
        return $this->belongsTo('App\Models\AttributeDetail', 'matt', 'matt');
    }
}

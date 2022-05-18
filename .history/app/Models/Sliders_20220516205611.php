<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    public $timestamps = false;
    protected $primaryKey = 'maslider';
    protected $fillable = ['maslider','slider'];

    // localScope
    public function scopeSearch($query) {
        if($key = request()->key) {
            $query = $query->where('maslider', 'like', '%'.$key.'%', 'or', 'slider', 'like', '%'.$key.'%');
        }
        return $query;
    }
}

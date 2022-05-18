<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chitiettt';
    protected $fillable = [
        'matt',
        'giatri',
    ];
    protected $primaryKey = 'macttt';
    public function hasAttribute()
    {
        return $this->belongsTo('App\Models\Attributes', 'matt', 'matt');
    }
}

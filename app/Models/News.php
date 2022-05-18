<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tieude',
        'noidung',
        'anh',
        'ngaydang',
        'update_at'
    ];
    protected $table = 'tintuc';
    protected $primaryKey = 'matin';
}

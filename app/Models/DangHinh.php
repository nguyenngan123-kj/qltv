<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class DangHinh extends Model
{
    protected $table = 'danghinh';
    protected $primaryKey = 'id_dh'; // nếu có
    public $timestamps = false;
     protected $fillable = [
        'tieude',
        'hinh',
    ];
}

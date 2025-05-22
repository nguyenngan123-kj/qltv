<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lop extends Model
{
    protected $table = 'lop';
    protected $primaryKey = 'id_lop';
    public $timestamps = false;
 public function sinhvien()
    {
        return $this->hasMany(SinhVien::class, 'id_lop');
    }
     protected $fillable = ['malop', 'tenlop', 'khoa', 'nienkhoa', 'gvcn'];

}

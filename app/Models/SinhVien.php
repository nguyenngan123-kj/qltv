<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SinhVien extends Model
{
    protected $table = 'sinhvien';
    protected $primaryKey = 'id_sv';
    public $timestamps = false;
 public function lop()
    {
        return $this->belongsTo(Lop::class, 'id_lop');
    }
 
     protected $fillable = [
        'masv',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'email',
        'sdt',
        'id_lop',
    ];
    
}

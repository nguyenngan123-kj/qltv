<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocGia extends Model
{
    protected $table = 'tkdocgia';
    protected $primaryKey = 'id_dg'; // nếu có
    public $timestamps = false;
  
    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'id_sv');
    }
      protected $fillable = [
        'ten_dg',
        'mk_dg',
        'id_sv',
      
    ];
}

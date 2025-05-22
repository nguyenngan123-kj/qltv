<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sach extends Model
{
    protected $table = 'sach';
    protected $primaryKey = 'id_sach';
    public $timestamps = false;

    public function tacgia()
    {
        return $this->belongsTo(TacGia::class, 'id_tg');
    }
    public function theloai()
    {
       
        return $this->belongsTo(TheLoai::class, 'id_tl');
    }
     public function yeuthich()
    {
        return $this->hasMany(YeuThich::class, 'id_sach');
    }
    protected $fillable = [
        'masach',
        'tensach',
    'id_tg',
    'id_tl',
    'nxb',
    'ngaynhap',
    'soluong',
    'hinhsach',
    'link',
];

}

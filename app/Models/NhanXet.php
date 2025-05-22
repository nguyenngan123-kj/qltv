<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class NhanXet extends Model
{
    protected $table = 'nhanxet';
    protected $primaryKey = 'id_nx'; // nếu có
    public $timestamps = false;
     protected $fillable = ['id_sach', 'id_dg', 'nhanxt'];
    public function docgia()
    {
    return $this->belongsTo(DocGia::class, 'id_dg');
    }
     public function sach()
    {
    return $this->belongsTo(Sach::class, 'id_sach');
    }
    
}

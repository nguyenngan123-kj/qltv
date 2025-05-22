<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class LichSu extends Model
{
    protected $table = 'lichsu';
    protected $primaryKey = 'id_ls'; // nếu có
    public $timestamps = false;
    protected $fillable = ['id_sach', 'id_dg'];
        public function docgia()
    {
    return $this->belongsTo(DocGia::class, 'id_dg');
    }
     public function sach()
    {
    return $this->belongsTo(Sach::class, 'id_sach');
    }
}

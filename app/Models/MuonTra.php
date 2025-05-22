<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuonTra extends Model
{
    protected $table = 'muontra';
    protected $primaryKey = 'id_mt'; // nếu có
    public $timestamps = false;

        protected $fillable = [
        'id_mt',
        'id_dg',
        'id_sach',
        'ngaymuon',
        'ngaytra',
        'ghichu',
    ];
}

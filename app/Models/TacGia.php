<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TacGia extends Model
{
    protected $table = 'tacgia';
    protected $primaryKey = 'id_tg';
    public $timestamps = false;

    public function sachs()
    {
        return $this->hasMany(Sach::class, 'id_tg');
    }
    protected $fillable = [
    'matg',
    'tentg',
    'namsinh',
    'quoctich',
];

}

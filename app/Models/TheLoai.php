<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TheLoai extends Model
{
    protected $table = 'theloai';
    protected $primaryKey = 'id_tl';
    public $timestamps = false;

    public function sachs()
    {
        return $this->hasMany(Sach::class, 'id_tl');
    }
    protected $fillable = ['matl', 'tentl'];

}
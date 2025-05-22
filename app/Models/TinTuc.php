<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class TinTuc extends Model
{
    protected $table = 'tintuc';
    protected $primaryKey = 'id_tt';
    public $timestamps = false;
}

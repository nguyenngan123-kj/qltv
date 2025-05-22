<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'tkadmin';
    protected $primaryKey = 'id_ad'; // nếu có
    public $timestamps = false;
}

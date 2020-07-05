<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArtikelModel extends Model
{
    protected $table = 'articles';
    
    protected $fillable = [
        'user_id','judul','isi','slug'
    ];
}

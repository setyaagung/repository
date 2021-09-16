<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edisi extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_edisi';
    protected $fillable = [
        'tema',
        'nama_edisi',
        'gambar',
        'tahun_terbit',
        'issn'
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $primaryKey = 'id_jurnal';
    protected $fillable = ['judul', 'tahun_terbit', 'file'];
}

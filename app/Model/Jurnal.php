<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $primaryKey = 'id_jurnal';
    protected $fillable = ['id_edisi', 'judul', 'abstrak', 'kata_kunci', 'tahun_terbit', 'file'];

    public function jurnalAuthors()
    {
        return $this->hasMany(JurnalAuthor::class, 'id_jurnal');
    }

    public function edisi()
    {
        return $this->belongsTo(Edisi::class, 'id_edisi');
    }
}

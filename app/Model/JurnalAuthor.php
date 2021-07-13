<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JurnalAuthor extends Model
{
    protected $primaryKey = 'id_jurnal_author';
    protected $fillable = ['id_jurnal', 'id_author'];
}

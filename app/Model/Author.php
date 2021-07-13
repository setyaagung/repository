<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $primaryKey = 'id_author';
    protected $fillable = ['nama_author'];
}

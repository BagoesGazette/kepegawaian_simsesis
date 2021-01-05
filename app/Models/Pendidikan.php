<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table        = 'tb_pendidikan';
    protected $primaryKey   = 'id_pendidikan';
    protected $fillable     = ['jenjang','nama_sekolah','jurusan','tahun_lulus']; 
}

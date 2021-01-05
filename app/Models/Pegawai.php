<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table        = 'tb_pegawai';
    protected $primaryKey   = 'id_pegawai';
    protected $fillable     = ['skpd','asal_pegawai','status_hukum','jenis_pegawai','pangkat','tmt','masa_kerja']; 
}

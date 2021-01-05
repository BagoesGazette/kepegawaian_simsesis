<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $table        = 'tb_data_diri';
    protected $primaryKey   = 'id_dataDiri';
    protected $fillable     = ['image','kode_guru','nama_lengkap','nip','nuptk','status_pegawai','sumber_gaji','wilayah_pembayaran','no_ktp','tempat','tanggal_lahir','jenis_kelamin','agama','status_perkawinan','alamat_rumah','email','no_hp','suami_istri','jumlah_anak'];
}

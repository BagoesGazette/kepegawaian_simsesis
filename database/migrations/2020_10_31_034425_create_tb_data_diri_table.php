<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDataDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_diri', function (Blueprint $table) {
            $table->bigIncrements('id_dataDiri');
            $table->string('image');
            $table->string('kode_guru');
            $table->string('nama_lengkap');
            $table->string('nip');
            $table->string('nuptk');
            $table->enum('status_pegawai',['PNS','GTT','PTT','MOU']);
            $table->string('sumber_gaji');
            $table->string('wilayah_pembayaran');
            $table->string('no_ktp');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->text('alamat_rumah');
            $table->string('email');
            $table->string('no_hp');
            $table->string('suami_istri');
            $table->integer('jumlah_anak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_data_diri');
    }
}

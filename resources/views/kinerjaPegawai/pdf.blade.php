<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMKN 2 TRENGGALEK</title>
    <link rel="icon" href=" {{ asset("assets/img/image1.png") }} ">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ public_path("assets/img/image2.png") }}" alt="image" width="100" style="position: absolute;">
            </div>
            <div class="col-md-8 text-center">
                <h6>PEMERINTAH PROVINSI JAWA TIMUR</h6>
                <h6>DINAS PENDIDIKAN</h6>
                <h6>SEKOLAH MENENGAH KEJURUAN NEGERI 2</h6>
                <h5>TRENGGALEK</h5>
                <p style="font-size: 10px">Jln. Ronggowarsito Gg Sidomukti Nomor 01 Telp.(0355) 7690148</p>
                <p style="font-size: 10px; margin-top:-15px">e-mail : <span class="text-primary">smknduatrenggalek@yahoo.co.id</span> || http:\\<span class="text-primary text-underlined"> www.smk2trenggalek.sch.id</span></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-right" style="margin-top: -20px;">Kode Pos:66315</p>
                <hr size="5" style="margin-top: -10px;">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center">Data Diri</h5>
                <img style="position: absolute; margin-left: 350px; margin-top: 100px" src="{{ public_path("assets/img/pegawai/".$dataDiri->image) }}" width="200" height="250">
                <table>
                    <tr>
                        <td>Kode Guru</td>
                        <td>: {{ $dataDiri->kode_guru }}</td>
                      </tr>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td>: {{ $dataDiri->nama_lengkap }}</td>
                      </tr>
                      <tr>
                        <td>NIP</td>
                        <td>: {{ $dataDiri->nip }}</td>
                      </tr>
                      <tr>
                        <td>NUPTK</td>
                        <td>: {{ $dataDiri->nuptk }}</td>
                      </tr>
                      <tr>
                        <td>Status Pegawai</td>
                        <td>: {{ $dataDiri->status_pegawai }}</td>
                      </tr>
                      <tr>
                        <td>Sumber Gaji</td>
                        <td>: {{ $dataDiri->sumber_gaji }}</td>
                      </tr>
                      <tr>
                        <td>Wilayah Pembayaran</td>
                        <td>: {{ $dataDiri->wilayah_pembayaran }}</td>
                      </tr>
                      <tr>
                        <td>No KTP</td>
                        <td>: {{ $dataDiri->no_ktp }}</td>
                      </tr>
                      <tr>
                        <td>Tempat</td>
                        <td>: {{ $dataDiri->tempat }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td>: {{ date("m-d-Y", strtotime($dataDiri->tanggal_lahir)) }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $dataDiri->jenis_kelamin }}</td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>: {{ $dataDiri->agama }}</td>
                      </tr>
                      <tr>
                        <td>Status Perkawinan</td>
                        <td>: {{ $dataDiri->status_perkawinan }}</td>
                      </tr>
                      <tr>
                        <td>Alamat Rumah</td>
                        <td>: {{ $dataDiri->alamat_rumah }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>: {{ $dataDiri->email }}</td>
                      </tr>
                      <tr>
                        <td>No Hp</td>
                        <td>: {{ $dataDiri->no_hp }}</td>
                      </tr>
                      <tr>
                        <td>Suami/Istri</td>
                        <td>: {{ $dataDiri->suami_istri }}</td>
                      </tr>
                      <tr>
                        <td>Jumlah Anak</td>
                        <td>: {{ $dataDiri->jumlah_anak }}</td>
                      </tr>
                </table>
                <h5 class="text-center mt-5">Data Pegawai</h5>
                <table>
                    <tr>
                        <td>SKPD</td>
                        <td>: {{ $pegawai->skpd }}</td>
                      </tr>
                      <tr>
                        <td>Asal Pegawai</td>
                        <td>: {{ $pegawai->asal_pegawai }}</td>
                      </tr>
                      <tr>
                        <td>Status Hukum</td>
                        <td>: {{ $pegawai->status_hukum }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Pegawai</td>
                        <td>: {{ $pegawai->jenis_pegawai }}</td>
                      </tr>
                      <tr>
                        <td>Pangkat</td>
                        <td>: {{ $pegawai->pangkat }}</td>
                      </tr>
                      <tr>
                        <td>TMT</td>
                        <td>: {{ $pegawai->tmt }}</td>
                      </tr>
                      <tr>
                        <td>Masa kerja</td>
                        <td>: {{ $pegawai->masa_kerja }}</td>
                      </tr>
                </table>
                <h5 class="text-center mt-5">Data Pendidikan</h5>
                <table>
                    <tr>
                        <td>Jenjang</td>
                        <td>: {{ $pendidikan->jenjang }}</td>
                      </tr>
                      <tr>
                        <td>Nama Sekolah</td>
                        <td>: {{ $pendidikan->nama_sekolah }}</td>
                      </tr>
                      <tr>
                        <td>Jurusan</td>
                        <td>: {{ $pendidikan->jurusan }}</td>
                      </tr>
                      <tr>
                        <td>Tahun Lulus</td>
                        <td>: {{ $pendidikan->tahun_lulus }}</td>
                      </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Informasi Ketenagaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Informasi Ketenagaan</div>
        </div>
      </div>

      @if (session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>x</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
    @endif

      @if (Auth::user()->image === null)
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="{{ url("assets/img/avatar/avatar-1.png") }}" class="rounded-circle profile-widget-picture">                
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label text-danger font-weight-bold">Lengkapi Data anda dengan klik tombol dibawah</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ Auth::user()->name }}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Pegawai</div></div>
                <table>
                    <tr>
                        <td>NUPTK</td>
                        <td>: {{ Auth::user()->nuptk }}</td>
                    </tr>
                    <tr>
                        <td>Akun dibuat</td>
                        <td>: {{ date("m-d-Y", strtotime(Auth::user()->created_at)) }}</td>
                    </tr>
                </table>
              </div>
              <div class="card-footer text-center">
                <a href="{{ url("informasiKetenagaan/show/".Auth::user()->id) }}" class="btn btn-primary btn-block">Lengkapi Data</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="{{ url('assets/img/pegawai/'.Auth::user()->image) }}" class="profile-widget-picture">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Cetak PDF</div>
                    <div class="profile-widget-item-value"><a href="{{ url("informasiKetenagaan/pdf") }}" target="_blank" class="btn btn-danger"><i class="far fa-file-pdf"></i></a></div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Pegawai</div></div>
                <table>
                  <tr>
                    <td><h5>Data Pegawai</h5></td>
                  </tr>
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
                <table>
                  <tr>
                    <td><h5>Data Pendidikan</h5></td>
                  </tr>
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
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
                <table>
                  <tr>
                    <td><h5>Data Diri</h5></td>
                  </tr>
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
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

    </section>
</div>
@show
@include('layouts.footer')
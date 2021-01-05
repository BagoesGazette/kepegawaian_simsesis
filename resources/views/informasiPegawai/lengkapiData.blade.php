@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Informasi Pegawai</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/informasiPegawai">Informasi Pegawai</a></div>
            <div class="breadcrumb-item">Melengkapi Data</div>
        </div>
      </div>


      <div class="section-body">
        <div class="row mt-sm-4">
          
          <div class="col-12 col-md-12 col-lg-5">
            <form action="{{ route('lengkapiDataPegawai') }}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
            <input type="hidden" name="nuptk" value="{{ $user->nuptk }}">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="{{ url("assets/img/avatar/avatar-1.png") }}" id="previewImg" class="profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                      <div class="profile-widget-item-label text-left ml-5">Form Data Diri</div>
                    </div>
                  </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ $user->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Pegawai</div></div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" onchange="previewFile(this)" class="form-control" name="image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kode Guru</label>
                    <input type="text" class="form-control" value="{{ old('kode_guru') }}" name="kode_guru">
                    @error('kode_guru')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" name="nip" value="{{ old('nip') }}">
                    @error('nip')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NUPTK</label>
                    <input type="text" class="form-control" name="nuptk" value="{{ $user->nuptk }}" readonly>
                    @error('nuptk')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status Kepegawaian</label>
                    <select name="status" class="form-control">
                        <option value="PNS">PNS</option>
                        <option value="GTT">GTT</option>
                        <option value="PTT">PTT</option>
                        <option value="MOU">MOU</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sumber Gaji</label>
                    <input type="text" class="form-control" name="sumber_gaji" value="{{ old('sumber_gaji') }}">
                    @error('sumber_gaji')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Wilayah Pembayaran</label>
                    <input type="text" class="form-control" name="wilayah_pembayaran" value="{{ old('wilayah_pembayaran') }}">
                    @error('wilayah_pembayaran')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No KTP</label>
                    <input type="number" class="form-control" name="no_ktp" value="{{ old('no_ktp') }}">
                    @error('no_ktp')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Tempat</label>
                            <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}">
                            @error('tempat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                            @error('tanggal_lahir')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        @error('jenis_kelamin')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                    @error('agama')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status Perkawinan</label>
                    <input type="text" class="form-control" name="status_perkawinan" value="{{ old('status_perkawinan') }}">
                    @error('status_perkawinan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" class="form-control" name="alamat_rumah" value="{{ old('alamat_rumah') }}">
                    @error('alamat_rumah')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control" maxlength="13" value="{{ old('no_hp') }}" onkeypress="isInputNumber(event)" name="no_hp">
                    @error('no_hp')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Suami / Istri</label>
                    <input type="text" class="form-control" name="suami_istri" value="{{ old('suami_istri') }}">
                    @error('suami_istri')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah Anak</label>
                    <input type="number" class="form-control" name="jumlah_anak" value="{{ old('jumlah_anak') }}">
                    @error('jumlah_anak')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                  <h4>Data Kepegawaian dan Pendidikan</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" id="toDate" value="{{ date("Y-m-d") }}">
                    <div class="form-group">
                        <label>SKPD</label>
                        <input type="text" class="form-control" name="skpd" value="{{ old('skpd') }}">
                        @error('skpd')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Asal Kepegawaian</label>
                        <input type="text" class="form-control" name="asal_kepegawaian" value="{{ old('asal_kepegawaian') }}">
                        @error('asal_kepegawaian')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Status Hukum Pegawai</label>
                        <input type="text" class="form-control" name="status_hukum" value="{{ old('status_hukum') }}">
                        @error('status_hukum')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Kepegawaian</label>
                        <input type="text" class="form-control" name="jenis_kepegawaian" value="{{ old('jenis_kepegawaian') }}">
                        @error('jenis_kepegawaian')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Pangkat / Gol Terahkir</label>
                        <input type="text" class="form-control" name="pangkat" value="{{ old('pangkat') }}">
                        @error('pangkat')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>TMT</label>
                        <input type="date" class="form-control" name="tmt" id="fromDate" onchange="javascript:calculate();">
                        @error('tmt')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Masa Kerja Keseluruhan</label>
                        <input type="text" name="masa_kerja" class="form-control"  id="masaKerja" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenjang</label>
                        <select name="jenjang" class="form-control">
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                        @error('jenjang')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                        @error('nama_sekolah')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}">
                        @error('jurusan')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input type="text" class="form-control" name="tahun_lulus" value="{{ old('tahun_lulus') }}">
                        @error('tahun_lulus')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Lengkapi Data</button>
                    </div>
                </div>
            </div>
            </form>
          </div>

        </div>
      </div>
    </section>
</div>
@show
@include('layouts.footer')
<script>
    function previewFile(input){
      var file = $("input[type=file]").get(0).files[0];
      if(file){
        var reader = new FileReader();
        reader.onload = function(){
          $("#previewImg").attr("src",reader.result);
        }
        reader.readAsDataURL(file);
      }
    }
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);

        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }

    function calculate(){
        var fromDate = document.getElementById('fromDate').value;
        var toDate = document.getElementById('toDate').value;
        try {
            var result = getDateDifference(new Date(fromDate), new Date(toDate));

            if (result && !isNaN(result.years)) {
                document.getElementById('masaKerja').value = 
                    result.years + ' tahun' + (result.years == 1 ? ' ' : ' ') +
                    result.months + ' bulan' + (result.months == 1 ? ' ' : ' ') + 'dan ' +
                    result.days + ' hari' + (result.days == 1 ? '' : '');
            }
        } catch (e) {
            console.error(e);
        }
    }

    function getDateDifference(startDate, endDate) {
        if (startDate > endDate) {
            document.getElementById('masaKerja').value = "Data masa kerja anda tidak sesuai"
        return null;
        }
        var startYear = startDate.getFullYear();
        var startMonth = startDate.getMonth();
        var startDay = startDate.getDate();

        var endYear = endDate.getFullYear();
        var endMonth = endDate.getMonth();
        var endDay = endDate.getDate();

        // We calculate February based on end year as it might be a leep year which might influence the number of days.
        var february = (endYear % 4 == 0 && endYear % 100 != 0) || endYear % 400 == 0 ? 29 : 28;
        var daysOfMonth = [31, february, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        var startDateNotPassedInEndYear = (endMonth < startMonth) || endMonth == startMonth && endDay < startDay;
        var years = endYear - startYear - (startDateNotPassedInEndYear ? 1 : 0);

        var months = (12 + endMonth - startMonth - (endDay < startDay ? 1 : 0)) % 12;

        // (12 + ...) % 12 makes sure index is always between 0 and 11
        var days = startDay <= endDay ? endDay - startDay : daysOfMonth[(12 + endMonth - 1) % 12] - startDay + endDay;

        return {
            years: years,
            months: months,
            days: days
        };
    }

  </script>  
  
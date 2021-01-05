@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Update Admin Pegawai</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/admin">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/adminPegawai">Admin Pegawai</a></div>
            <div class="breadcrumb-item active" aria-current="page">Update Admin Pegawai</div>
        </div>
      </div>


      <div class="section-body">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Form Update Admin Pegawai</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("adminPegawaiUpdate") }}" method="post" autocomplete="off" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="id" value="{{ $adminPegawai->id }}">
                        <input type="hidden" name="remember_token" value="{{ $adminPegawai->remember_token }}">
                        <input type="hidden" name="password" value="{{ $adminPegawai->password }}">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $adminPegawai->name }}">
                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NUPTK</label>
                            <input type="number" class="form-control" name="nuptk" value="{{ $adminPegawai->nuptk }}">
                            @error('nuptk')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Update Kepegawaian</button>
                    </form>
                </div>
              </div>
        </div>
      </div>
    </section>
  </div>
@show 
@include('layouts.footer')
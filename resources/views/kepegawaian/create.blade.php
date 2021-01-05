@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Kepegawaian</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/admin">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/kepegawaian">Kepegawaian</a></div>
            <div class="breadcrumb-item active" aria-current="page">Tambah Kepegawaian</div>
        </div>
      </div>


      <div class="section-body">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Form Tambah Kepegawaian</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("kepegawaianStore") }}" method="post" autocomplete="off" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>NUPTK</label>
                            <input type="number" class="form-control" name="nuptk">
                            @error('nuptk')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Tambah Kepegawaian</button>
                    </form>
                </div>
              </div>
        </div>
      </div>
    </section>
  </div>
@show 
@include('layouts.footer')
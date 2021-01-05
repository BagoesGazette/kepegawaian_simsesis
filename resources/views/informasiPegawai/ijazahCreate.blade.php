@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Ijazah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/informasiPegawai/ijazah">Ijazah</a></div>
            <div class="breadcrumb-item active" aria-current="page">Tambah Ijazah</div>
        </div>
      </div>

      <div class="section-body">
          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="card">
                      <div class="card-header">
                          Form Upload Ijazah
                      </div>
                      <div class="card-body">
                        <form action="{{ route("adminIjazahStore") }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label>NUPTK</label>
                                <select name="nuptk" class="form-control">
                                    @foreach ($kepegawaian as $j)
                                        <option value="{{ $j->nuptk }}">{{ $j->name }} - {{ $j->nuptk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Upload Ijazah</label>
                                <input type="file" class="form-control" name="pdf">
                                @error('pdf')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <p class="text-danger">File harus bertipe pdf</p>
                            </div>
                            <a href="/informasiPegawai/ijazah" class="btn btn-warning">Kembali</a>
                            <button class="btn btn-primary float-right">Upload</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
</div>
@show
@include('layouts.footer')
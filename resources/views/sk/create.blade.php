@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah SK</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/sk">SK</a></div>
            <div class="breadcrumb-item active" aria-current="page">Tambah SK</div>
        </div>
      </div>

      <div class="section-body">
          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="card">
                      <div class="card-header">
                          Form Upload SK
                      </div>
                      <div class="card-body">
                        <form action="{{ route("skStore") }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label>Upload SK</label>
                                <input type="file" class="form-control" name="pdf">
                                @error('pdf')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <p class="text-danger">File harus bertipe pdf</p>
                            </div>
                            <a href="/sk" class="btn btn-warning">Kembali</a>
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
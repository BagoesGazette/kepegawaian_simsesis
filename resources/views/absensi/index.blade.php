@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Absensi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route("dashboard") }}">Dashboard</a></div>
            <div class="breadcrumb-item">Absensi</div>
        </div>
      </div>
    </section>

    <div class="card">
        <div class="card-header">
            <form action="{{ route("createImport") }}" class="form-inline" enctype="multipart/form-data" method="POST">@csrf
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                  </div>
                <button  class="btn btn-success ml-2">Import Data</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-bordered">

                </div>
            </div>
        </div>
    </div>
</div>
@show
@include('layouts.footer')
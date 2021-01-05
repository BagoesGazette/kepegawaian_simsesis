@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Informasi Pegawai</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Informasi Pegawai</div>
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

    <div class="section-body">
        <div class="card">
            <div class="card-header">
              Data Pegawai
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>NUPTK</th>
                      <th>Tanggal Upload</th>
                      <th>Pilihan</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $no=1
                      @endphp
                      @foreach ($adminPegawai as $j)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $j->name }}</td>
                          <td>{{ $j->nuptk }}</td>
                          <td>{{ date("m-d-Y h:i:s",strtotime($j->created_at)) }}</td>
                          <td>
                              @if ($j->image === null)                            
                              <a href="{{ url('informasiPegawai/lengkapiData/'.$j->id) }}" class="btn btn-primary">Lengkapi Data</a>
                              @else
                              <a href="{{ url('informasiPegawai/show/'.$j->nuptk) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                              <a target="_blank" href="{{ url('informasiPegawai/pdf/'.$j->nuptk) }}" class="btn btn-primary"><i class="far fa-file-pdf"></i></a>
                              @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    </section>
</div>
@show
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
  $('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Hapus Data',
      text: "Apakah anda ingin menghapus data ini",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

  })

  $(document).ready(function() {
    $('#datatable').DataTable();
  });
</script>
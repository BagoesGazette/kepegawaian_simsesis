@include('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Change Password Super Admin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/admin">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/superAdmin">Super Admin</a></div>
            <div class="breadcrumb-item active" aria-current="page">Change Password Super Admin</div>
        </div>
      </div>


      <div class="section-body">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Form Change Password Super Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("passwordSuperAdmin") }}" method="post" autocomplete="off" enctype="multipart/form-data">@csrf
                      <input type="hidden" name="id" value="{{ $superAdmin->id }}">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Change Password</button>
                    </form>
                </div>
              </div>
        </div>
      </div>
    </section>
  </div>
@show 
@include('layouts.footer')
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        @if (auth()->user()->role == "super-admin")
        <a href="#">Super Admin</a>
        @elseif(auth()->user()->role == "kepegawaian")
        <a href="#">Pegawai</a>
        @elseif(auth()->user()->role == "adminPegawai")
        <a href="#">Admin Pegawai</a>
        @endif
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SIM</a>
      </div>
      <ul class="sidebar-menu">
          @if (auth()->user()->role == "super-admin")
          <li class="menu-header">Dashboard</li>
          <li class="{{ set_active('dashboard') }}"><a class="nav-link" href="{{ route("dashboard") }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Data</li>
          <li class="nav-item dropdown {{ set_active('adminPegawai') }} {{ set_active('kepegawaian') }} {{ set_active("kepegawaianCreate") }} {{ set_active("kepegawaianShow") }} {{ set_active("kepegawaianPassword") }} {{ set_active("adminPegawaiCreate") }} {{ set_active("adminPegawaiPassword") }} {{ set_active("adminPegawaiShow") }} {{ set_active("superAdmin") }} {{ set_active("superAdminCreate") }} {{ set_active("superAdminShow") }} {{ set_active("superAdminPassword") }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
            <ul class="dropdown-menu">
              <li class="{{ set_active('adminPegawai') }} {{ set_active("adminPegawaiCreate") }} {{ set_active("adminPegawaiShow") }} {{ set_active("adminPegawaiPassword") }}"><a class="nav-link" href="{{ route("adminPegawai") }}">Admin Pegawai</a></li>
              <li class="{{ set_active('kepegawaian') }} {{ set_active("kepegawaianCreate") }} {{ set_active("kepegawaianShow") }} {{ set_active("kepegawaianPassword") }}"><a class="nav-link" href="{{ route("kepegawaian") }}">Kepegawaian</a></li>
              <li class="{{ set_active("superAdmin") }} {{ set_active("superAdminCreate") }} {{ set_active("superAdminShow") }} {{ set_active("superAdminPassword") }}"><a class="nav-link" href="{{ route("superAdmin") }}">Super Admin</a></li>
            </ul>
          </li>
          @elseif(auth()->user()->role == "kepegawaian")
          <li class="menu-header">Informasi</li>
          <li class="{{ set_active('informasiKetenagaan') }} {{ set_active('informasiKetenagaanShow') }}"><a class="nav-link" href="{{ route("informasiKetenagaan") }}"><i class="far fa-file"></i> <span>Informasi Ketenagaan</span></a></li>
          <li class="nav-item dropdown {{ set_active('ijazah') }} {{ set_active('ijazahCreate') }} {{ set_active('sertifikat') }} {{ set_active('sertifikatCreate') }} {{ set_active('sk') }} {{ set_active('skCreate') }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-upload"></i> <span>Upload </span></a>
            <ul class="dropdown-menu">
              <li class="{{ set_active('ijazah') }} {{ set_active('ijazahCreate') }}"><a class="nav-link" href="{{ route('ijazah') }}">Upload Ijazah Pendidikan</a></li>
              <li class="{{ set_active('sertifikat') }} {{ set_active('sertifikatCreate') }}"><a class="nav-link" href="{{ route('sertifikat') }}">Upload Sertifikat</a></li>
              <li class="{{ set_active('sk') }} {{ set_active('skCreate') }} "><a class="nav-link" href="{{ route("sk") }}">Upload SK</a></li>
            </ul>
          </li>
          @elseif(auth()->user()->role == "adminPegawai")
          <li class="menu-header">Informasi</li>
          <li class="{{ set_active('informasiPegawai') }} {{ set_active("adminShow") }} {{ set_active('lengkapiData') }} {{ set_active('informasiPegawaiShow') }}"><a class="nav-link" href="{{ route("informasiPegawai") }}"><i class="far fa-file"></i> <span>Informasi Pegawai</span></a></li>
          <li class="nav-item dropdown {{ set_active('adminIjazah') }} {{ set_active('informasiPegawaiIjazahCreate') }} {{ set_active('adminSertifikat') }} {{ set_active('adminSertifikatCreate') }} {{ set_active('adminSk') }} {{ set_active('adminSkCreate') }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-upload"></i> <span>Upload </span></a>
            <ul class="dropdown-menu">
              <li class="{{ set_active('adminIjazah') }} {{ set_active('informasiPegawaiIjazahCreate') }}"><a class="nav-link" href="{{ route('adminIjazah') }}">Upload Ijazah Pendidikan</a></li>
              <li class="{{ set_active('adminSertifikat') }} {{ set_active('adminSertifikatCreate') }}"><a class="nav-link" href="{{ route('adminSertifikat') }}">Upload Sertifikat</a></li>
              <li class="{{ set_active('adminSk') }} {{ set_active('adminSkCreate') }} "><a class="nav-link" href="{{ route("adminSk") }}">Upload SK</a></li>
            </ul>
          </li>
          @endif
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </aside>
  </div>
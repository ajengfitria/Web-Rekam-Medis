<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">Navigasi</li>
           <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}">
              <!-- <ion-icon name="home-outline"></ion-icon> -->
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (Auth::user()->hasRole('Admin'))
          <li class="nav-item">
            <a href=" {{route('dokter.index')}} " class="nav-link {{ Request::segment(1) === 'dokter' ? 'active' : null }}">
              <!-- <ion-icon name="home-outline"></ion-icon> -->
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Dokter
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{route('pasien.index')}} " class="nav-link {{ Request::segment(1) === 'pasien' ? 'active' : null }}">
              <!-- <ion-icon name="home-outline"></ion-icon> -->
              <i class="nav-icon fas fa-wheelchair"></i>
              <p>
                Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rekamMedis.index')}}" class="nav-link {{ Request::segment(1) === 'rekamMedis' ? 'active' : null }} {{ Request::segment(1) === 'rekamMedisAdd' ? 'active' : null }}">
              <i class="nav-icon fas fa-notes-medical"></i>
              <p>
                Rekam Medis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kartuKes.index')}}" class="nav-link {{ Request::segment(1) === 'kartuKes' ? 'active' : null }} {{ Request::segment(1) === 'kartuKesAdd' ? 'active' : null }}">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Kartu Kesehatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('obat.index')}}" class="nav-link {{ Request::segment(1) === 'obat' ? 'active' : null }} {{ Request::segment(1) === 'obatAdd' ? 'active' : null }}">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Obat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ruang.index')}}" class="nav-link {{ Request::segment(1) === 'ruang' ? 'active' : null }}">
              <i class="nav-icon fas fa-procedures"></i>
              <p>
                Ruang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link {{ Request::segment(1) === 'users' ? 'active' : null }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            <!-- <ion-icon name="home-outline"></ion-icon> -->
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sign Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
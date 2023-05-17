<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ asset('assets/index3.html') }}" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PKLio</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Agus Prayogi</a>
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
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profile', ['nama' => 'Agus Prayogi']) }}"
            class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('kuliah') }}" class="nav-link {{ request()->routeIs('kuliah') ? 'active' : '' }}">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Pengalaman Kuliah
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('articles.index') }}"
            class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>
              List Articles
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('hobi') }}" class="nav-link {{ request()->routeIs('hobi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-thumbs-up"></i>
            <p>
              Data Hobi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('keluarga.index') }}"
            class="nav-link {{ request()->routeIs('keluarga.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Keluarga
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('matkul.index') }}" class="nav-link {{ request()->routeIs('matkul.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-laptop-code"></i>
            <p>
              Mata Kuliah
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('mahasiswa.index') }}"
            class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-laptop-code"></i>
            <p>
              Mahasiswa
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
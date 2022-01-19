<aside class="main-sidebar sidebar-light-primary elevation-4" style="background: #4e73df">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
      <span class="brand-text text-white" style="font-weight: 600">Blogger</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle " alt="{{ \Auth::user()->name }}">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white">{{ \Auth::user()->name }}</a>
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
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt text-white"></i>
              <p class="text-white">
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header text-light">My Post</li>

          <li class="nav-item">
            <a href="{{ route('dashboard.post.index') }}" class="nav-link {{ request()->routeIs('dashboard.post*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image text-light"></i>
              <p class="text-light">
                My Post
              </p>
            </a>
          </li>

          @can('viewAny', App\Models\Category::class)
          <li class="nav-header text-light">Admin</li>

          <li class="nav-item">
            <a href="{{ route('dashboard.category.index') }}" class="nav-link {{ request()->routeIs('dashboard.category*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image text-light"></i>
              <p class="text-light">
                Categories
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

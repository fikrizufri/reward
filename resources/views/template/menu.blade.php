<aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('template/dist/img/logo.png')}}" width="30%" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="{{route('user.ubah')}}" class="d-block">{{ucfirst(Auth::user()->name)}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @can('view-customer')
        <li class="nav-item">
          <a href="{{route('customer.index')}}" class="nav-link {{ Request::segment(1) === 'customer' ? 'active' : '' }}">
            <i class="fa fa-users nav-icon"></i>
            <p>Pelangan</p>
          </a>
        </li>
        @endcan
        @can('view-user')

        <li class="nav-item has-treeview {{ Request::segment(1) === 'user' ? 'menu-open' : '' }} {{ Request::segment(1) === 'role' ? 'menu-open' : '' }} {{ Request::segment(1) === 'task' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::segment(1) === 'user'? 'active' : '' }} {{ Request::segment(1) === 'role' ? 'active' : '' }}  {{ Request::segment(1) === 'task' ? 'active' : '' }}">
            <i class=" nav-icon fas fa-table"></i>
            <p>
              Pengguna
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{ Request::segment(1) === 'user' ? 'active' : '' }}">
                <i class="far fa-user nav-icon"></i>
                <p>Pengguna</p>
              </a>
            </li>
          </ul>

          @can('view-roles')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('role.index')}}" class="nav-link {{ Request::segment(1) === 'role' ? 'active' : '' }}">
                <i class="fa fa-key nav-icon"></i>
                <p>Hak Akses</p>
              </a>
            </li>
          </ul>
          @endcan
          @role('superadmin')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('task.index')}}" class="nav-link {{ Request::segment(1) === 'task' ? 'active' : '' }}">
                <i class="fa fa-archive nav-icon"></i>
                <p>Task</p>
              </a>
            </li>
          </ul>
          @endrole
        </li>
        @endcan

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-power-off"></i>
            <p>
              Keluar
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('pages.dashboard') }}" class="brand-link">
      <img src="{{ asset('/storage/images/sidebar/' . config('app.dashboard_logo_white')) }}" alt="Project Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $setting_title->dashboard_name ?? 'TEMPLATE' }}</span>
      {{-- {{ config('app.dashboard_name') }} --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex align-items-center">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2 picture" alt="User Profile Picture">
        </div>
        <div class="info">
          <a href="{{ route('user-profile') }}" class="d-block name">{{ Auth::user()->name }}</a>
          <span class="text-sm text-muted">{{ Auth::user()->role->name }}</span>
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
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="{{ route('pages.dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dynamic-table.index') }}" class="nav-link {{ request()->is('dynamic-table') || 
                                                                                request()->is('dynamic-table/create') ||
                                                                                request()->is('dynamic-table/*/show') ||
                                                                                request()->is('dynamic-table/*/edit') ||
                                                                                request()->is('dynamic-table/option-management') ||
                                                                                request()->is('dynamic-table/option-management/configuration-statuses/create') ||
                                                                                request()->is('dynamic-table/option-management/configuration-statuses/*/edit') ||
                                                                                request()->is('dynamic-table/option-management/items/create') ||
                                                                                request()->is('dynamic-table/option-management/items/*/edit') ||
                                                                                request()->is('dynamic-table/option-management/locations/create') ||
                                                                                request()->is('dynamic-table/option-management/locations/*/edit') ||
                                                                                request()->is('dynamic-table/option-management/manufacturers/create') ||
                                                                                request()->is('dynamic-table/option-management/manufacturers/*/edit') ||
                                                                                request()->is('dynamic-table/option-management/position-statuses/create') ||
                                                                                request()->is('dynamic-table/option-management/position-statuses/*/edit') ||
                                                                                request()->is('dynamic-table/filter-results/item/*') ||
                                                                                request()->is('dynamic-table/filter-results/item/*/show') ||
                                                                                request()->is('dynamic-table/filter-results/manufacturer/*') ||
                                                                                request()->is('dynamic-table/filter-results/manufacturer/*/show') ||
                                                                                request()->is('dynamic-table/filter-results/configuration-status/*') ||
                                                                                request()->is('dynamic-table/filter-results/configuration-status/*/show') ||
                                                                                request()->is('dynamic-table/filter-results/location/*') ||
                                                                                request()->is('dynamic-table/filter-results/location/*/show') ||
                                                                                request()->is('dynamic-table/filter-results/position-status/*') ||
                                                                                request()->is('dynamic-table/filter-results/position-status/*/show') ||
                                                                                request()->is('dynamic-table/recycle-bin')  ||
                                                                                request()->is('dynamic-table/column-management') ||
                                                                                request()->is('dynamic-table/column-management/edit-column/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Asset Management
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('dynamic-table.index') }}" class="nav-link {{ request()->is('dynamic-table') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Dynamic Table
              </p>
            </a>
          </li> --}}
          @if(Auth::user()->role->id == '1')
          <li class="nav-item">
            <a href="{{ route('user-management.index') }}" class="nav-link {{ request()->is('user-management') ||
                                                                              request()->is('user-management/add-new-user') ||
                                                                              request()->is('user-management/*/edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          @endif
          @if(in_array(Auth::user()->role->id, [1, 2]))          
          <li class="nav-item">
            <a href="{{ route('activity-log.index') }}" class="nav-link {{ request()->is('activity-log') ||
                                                                           request()->is('activity-log/*/show-detail') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Activity Logs
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->role->id == '1')
          <li class="nav-item">
            <a href="{{ route('customize-dashboard.edit') }}" class="nav-link {{ request()->is('customize-dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Customize Dashboard
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item">
            <a href="{{ route('dynamic-table.index') }}" class="nav-link {{ request()->is('dynamic-table') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Dynamic Table
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
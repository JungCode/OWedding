<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{route('admin.index')}}"><img src="{{asset('image/Picture1.png')}}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{route('admin.index')}}"><img src="{{asset('image/Picture1.png')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
    
     

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('admin.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Users Management</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('admin.fiance_index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Fiances Management</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('admin.template_index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Templates Management</span>
        </a>
      </li>
    </ul>
  </nav>

  <style>
    .collapse {
      visibility: visible !important;
    }
  </style>
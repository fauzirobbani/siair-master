<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="/public/images/faces/man.png" alt="profile">
            <span class="login-status online"></span>
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">ADMIN</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pelanggan') }}">
          <span class="menu-title">Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/tagihan') }}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Tagihan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/laporan') }}">
          <span class="menu-title">Laporan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/harga') }}">
          <span class="menu-title">Harga</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user') }}">
          <span class="menu-title">User</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
          <span class="menu-title">Logout</span>
        </a>
      </li> --}}
    </ul>
  </nav>

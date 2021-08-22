<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="https://siair.anproject.web.id/images/faces/man.png" alt="profile">
            <span class="login-status online"></span>
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datapribadi') }}">
          <span class="menu-title">Data Pribadi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/tagihan') }}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Tagihan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/laporan') }}">
          <span class="menu-title">Laporan Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
          <span class="menu-title">Logout</span>
        </a>
      </li>


    </ul>
  </nav>

<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html"><img src="/public/images/siair2.png" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/public/images/siair2.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">

            </div>

          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">



        <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="{{route('logout')}}">
            <i class="mdi mdi-power"></i>
          </a>
        </li>

      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
</nav>

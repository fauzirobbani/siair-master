<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Dashboard</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  @yield('css')
</head>


<body>
  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>

  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/datatables.min.js') }}"></script>


  <div class="container-scroller">
    @include('inc.navbar')
    <div class="container-fluid page-body-wrapper">

        {{-- diubah dari name jadi status --}}
        @if (Auth::user()->status == "1")
            @include('inc.sidebar')
        @else
            {{-- sidebar untuk member --}}
            @include('inc.sidebar_user')
        @endif
      {{-- @include('inc.sidebar') --}}
      @yield('content')
      @yield('script')
    </div>
  </div>
  <!-- container-scroller -->

</body>

</html>

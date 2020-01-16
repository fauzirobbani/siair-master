@extends('layouts.index')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <button class="btn btn-gradient-success mt-4" onclick="window.location.href='{{ route('datapribadi.edit', $pelanggan->id) }}'">Edit Data {{$user->name}}</button> <br><br>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Tabel Data Pribadi</p>
                        <div class="table-responsive">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>

                            @endif
                            <table id="" class="table">
                                <thead>
                                    {{-- <tr>Data Pribadi</tr> --}}
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>Nomor Rekening/Username</td>
                                            <td> : {{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td> : {{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td> : {{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td> : {{ $pelanggan->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor HP</td>
                                            <td> : {{ $pelanggan->hp }}</td>
                                        </tr>
                                        <tr>
                                                <td>Meteran Saat Ini</td>
                                                <td> : {{ $pelanggan->meteran }}</td>
                                        </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script>
        $(document).ready(function() {
            $('#tabelpelanggan').DataTable();
        } );
</script> --}}

@endsection

  {{-- <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer> --}}
  <!-- partial -->







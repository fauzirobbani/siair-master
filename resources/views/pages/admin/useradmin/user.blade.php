@extends('layouts.index')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <button class="btn btn-gradient-success mt-4" onclick="window.location.href='{{ route('newuser') }}'">+ Tambah Admin</button> <br><br>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Tabel Admin</p>
                        <div class="table-responsive">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>

                            @endif
                            <table id="tabelpelanggan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($list) > 0)
                                    @foreach($list['show'] as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->username }}</td>
                                        <td>{{ $list->email }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan=3>Tidak Ada Data</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function() {
            $('#tabelpelanggan').DataTable();
        } );
</script>

@endsection

  {{-- <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer> --}}
  <!-- partial -->







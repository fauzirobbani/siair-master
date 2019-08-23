@extends('layouts.index')

@section('content')

  <!-- partial:partials/_sidebar.html -->
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <table class="table table-bordered">
      </table>
      <form action="{{ route('pelanggan.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <Label>Nama Pelanggan</Label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Pelanggan">
        </div>
        <div class="form-group">
            <Label>Nomor Rekening</Label>
            <input type="text" class="form-control" name="rekening" placeholder="Nomer Rekening">
        </div>
        <div class="form-group">
            <Label>Alamat</Label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat">
        </div>
        <div class="form-group">
            <Label>HP</Label>
            <input type="text" class="form-control" name="hp" placeholder="cth : 62xxx">
        </div>
        <button class="btn btn-success">Submit</button>
      </form>
    </div>
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer>
  </div>
</div>

@endsection
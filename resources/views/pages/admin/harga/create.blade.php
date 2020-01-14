@extends('layouts.index')

@section('content')


<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Tambah Harga</p>
        <table class="table table-bordered"></table>
        <form action="{{ route('harga.store') }}" method="POST">{{ csrf_field() }}
          <div class="form-group">
            <Label>Harga Pakai</Label>
            <input type="text" class="form-control" name="harga_pakai" placeholder="Harga Pakai">
          </div>
          <div class="form-group">
            <Label>Harga Beban</Label>
            <input type="text" class="form-control" name="harga_beban" placeholder="Harga Beban">
          </div>
          <button class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

    {{-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer> --}}
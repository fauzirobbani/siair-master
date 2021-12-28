@extends('layouts.index')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">  
                      <div class="card-body">
                          <h4 class="card-title"><i class="mdi mdi-account-plus mr-3 icon-sm text-success"></i>Ubah Data Pelanggan #{{ $list->id }}</h4>
                          <form action="{{url('pelanggan', [$list->id])}}" method="POST">
                              {{method_field('PUT')}}
                              {{ csrf_field() }}
                              <div class="form-group">
                                <Label>Nama</Label>
                                <input type="text" class="form-control" name="nama" value="{{ $list->nama }}" placeholder="{{ $list->nama }}" required>
                              </div>
                              <div class="form-group">
                                <Label>Nomer Rekening</Label>
                                <input type="text" class="form-control" name="rekening" value="{{ $list->rekening }}" placeholder="{{ $list->rekening }}" required>
                              </div>
                              <div class="form-group">
                                <Label>Alamat</Label>
                                <input type="text" class="form-control" name="alamat" value="{{ $list->alamat }}" placeholder="{{ $list->alamat }}" required>
                              </div>
                              <div class="form-group">
                                <Label>HP</Label>
                                <input type="text" class="form-control" name="hp" value="{{ $list->hp }}" placeholder="{{ $list->hp }}" required>
                              </div>
                              <button class="btn btn-success">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  {{-- <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer> --}}
  <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection

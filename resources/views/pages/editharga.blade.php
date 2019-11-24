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
                          <h4 class="card-title"><i class="mdi mdi-account-plus mr-3 icon-sm text-success"></i>Ubah Data Harga #{{ $list->id }}</h4>
                          <form action="{{url('pelanggan', [$list->id])}}" method="POST">
                              {{method_field('PUT')}}
                              {{ csrf_field() }}
                              <div class="form-group">
                                <Label>Harga Pakai</Label>
                                <input type="text" class="form-control" name="harga_pakai" value="{{ $list->harga_pakai }}" placeholder="{{ $list->harga_pakai }}">
                              </div>
                              <div class="form-group">
                                <Label>Harga Beban</Label>
                                <input type="text" class="form-control" name="harga_beban" value="{{ $list->harga_beban }}" placeholder="{{ $list->harga_beban }}">
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
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection

@extends('layouts.index')

@section('content')


<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Pembayaran</p>
        <table class="table table-bordered"></table>
        <form action="{{ route('tagihan.pembayaran.store.asw', $tagihan->id) }}" method="POST">{{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <Label>No Rekening</Label>
              <input type="text" class="form-control" name="nama" id="rekening" value="{{$pelanggan->rekening}}" placeholder="" disabled>
                {{-- <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder=""> --}}
              </div>
              <div class="form-group">
                <Label>Nama Pelanggan</Label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{$pelanggan->nama}}" placeholder="" disabled>
              </div>
              <div class="form-group">
                <Label>Alamat</Label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{$pelanggan->alamat}}" placeholder="" disabled>
              </div>
              <div class="form-group">
                <Label>HP</Label>
                <input type="text" class="form-control" name="hp" id="hp" value="{{$pelanggan->hp}}" placeholder="" disabled>
              </div>
            </div>
            <div class="col-md-6">
                <Label>Tabel Rincian</Label>
              <table id="tabelrincian" class="table table-bordered table-striped" >
                <thead>
                  <tr>
                    <th>Bulan</th>
                    <th>Tagihan (Rp)</th>
                    <th>Total (Rp)</th>
                  </tr>
                  <tr>
                  <th>{{$tagihan->bulan}}</th>
                    <th>{{$tagihan->tagihan}}  <input type="text" value="{{$tagihan->tagihan}}" id="tagihan" hidden></th>
                    <th>{{$tagihan->tagihan}}</th>
                  </tr>

                </thead>
              </table>
              <div class="form-group">
                <Label style="font:bold">Cash</Label>
                <input type="text" class="form-control" name="pembayaran" id="pembayaran">
              </div>
              <div class="form-group">
                <Label style="font:bold">Kembalian</Label>
                <input type="text" class="form-control" name="kembalian" id="kembalian" disabled>
              </div>
              <div style="text-align: center">
                <button class="btn btn-success">Submit</button>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.rekening').select2();
});
</script>

<script>
    $(document).on('change', '#pembayaran',  function(){
        var pembayaran=$('#pembayaran').val();
        var tagihan=$('#tagihan').val();


        var total = Number(pembayaran)-Number(tagihan);

        $('#kembalian').val(total);

    })
</script>


@endsection

{{-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer> --}}

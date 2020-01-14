@extends('layouts.index')

@section('content')


<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Tambah Tagihan</p>
        <table class="table table-bordered"></table>
        <form action="{{ route('tagihan.store') }}" method="POST">{{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <Label>No Rekening</Label>
                {{-- <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder=""> --}}
                <select name="no_rekening" id="no_rekening" class="form-control rekening">
                  <option value="">Silahkan Pilih</option>
                  @foreach ($pelanggan as $item)
                    <option value="{{$item->rekening}}">{{$item->rekening}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <Label>Nama Pelanggan</Label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="" disabled>
              </div>
              <div class="form-group">
                <Label>Alamat</Label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="" disabled>
              </div>
              <div class="form-group">
                <Label>HP</Label>
                <input type="text" class="form-control" name="hp" id="hp" placeholder="" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <Label>Meteran Lama</Label>
                <input type="text" class="form-control" name="meteran" id="meteran" placeholder="" disabled>
              </div>
              <div class="form-group">
                <Label>Meteran Baru</Label>
                <input type="text" class="form-control" name="meteran_baru" id="meteran_baru" placeholder="Meteran Baru">
              </div>
              <div class="form-group">
                <Label>Volume</Label>
                <input type="text" class="form-control" name="volume" id="volume">
              </div>

              <table id="tabelpelanggan" class="table table-bordered table-striped" >
                <thead>
                  <tr>
                    <th>Harga (Rp)</th>
                    <th>Beban (Rp)</th>
                    <th>Total (Rp)</th>
                  </tr>
                  <tr>
                    <th><input type="text" class="form-control" name="harga_pakai" id="harga_pakai" value="{{$harga->harga_pakai}}" disabled></th>
                    <input type="text" class="form-control" name="harga_pakai_utama" id="harga_pakai_utama" value="{{$harga->harga_pakai}}" hidden>
                    <th><input type="text" class="form-control" name="harga_beban" id="harga_beban" value="{{$harga->harga_beban}}" disabled></th>
                    <th><input type="text" class="form-control" name="total" id="total" value="" ></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

          <div style="text-align: center">
            <button class="btn btn-success">Submit</button>
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
    $(document).on('change', '#no_rekening',  function(){
        var index=$('#no_rekening').val();
        console.log(index);

        $.ajax({
            url:"{{ route('tagihan.datapelanggan', 'kode=') }}"+index,

            type:'GET',

            success: function(data){
                console.log(data);
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#hp').val(data.hp);
                $('#meteran').val(data.meteran);


            },
            error: function(error){
                console.log(error);
                if (error.status == 422) {

                }
                else {
                    alert()
                }
            }
        });
    })
</script>

<script>
  $(document).on('change', '#meteran_baru',  function(){
    var meteran=$('#meteran').val();
    var meteran_baru=$('#meteran_baru').val();
    var harga_pakai=$('#harga_pakai_utama').val();
    var harga_beban=$('#harga_beban').val();
    var volume = meteran_baru-meteran;

    console.log(harga_pakai);

    // var total = Number(volume)*Number(harga_pakai)+Number(hargabeban);
    // fungsi hitung total
    var total = (volume*harga_pakai);
    $('#harga_pakai').val(total);
    total = Number(total)+Number(harga_beban);
    $('#volume').val(volume);
    $('#total').val(total);

    $
  })
</script>
@endsection

{{-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer> --}}

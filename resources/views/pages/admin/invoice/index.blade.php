<!DOCTYPE html>
<html lang="en">
<style>
@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;
  height: 29.7cm;
  margin: 0 auto;
  color: #555555;
  background: #FFFFFF;
  font-family: Arial, sans-serif;
  font-size: 14px;
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap;
  border-top: 1px solid #AAAAAA;
}

table tfoot tr:first-child td {
  border-top: none;
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223;

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
</style>
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body style="width:80%">
    <header class="clearfix" style="width:100%">
      <div id="logo" style="width:50%">
        <img src="{{asset('images/siair2.png')}}">
      </div>
      <div id="company" style="width:50%">
        <h2 class="name">KELURAHAN GIRITIRTO</h2>
        <div>Giritirto, Purwosari, Gunung Kidul, Yogyakarta</div>
        <div>(602) 519-0450</div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix" style="width:100%">
        <div id="client" style="width:50%">
            <b><h2 class="name">{{$data->pelanggan['nama']}}</h2></b>
            <div class="address">Alamat : {{$data->pelanggan['alamat']}}</div>
          <div class="text">Rekening : {{$data->pelanggan['rekening']}}</div>
        </div>
        <div id="invoice" style="width:50%">
          <h1>BUKTI PEMBAYARAN</h1>
            <div class="date">Tanggal : {{$data->tanggal_transaksi}}</div>
        </div>
      </div>
      <table id="tabelpelanggan" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nomor Rekening</th>
                <th>Nama</th>
                <th>Tagihan</th>
                <th>Pembayaran</th>
                <th>Kembalian</th>
            </tr>
            <tbody>
              <tr>
                  <td style="text-align:center">{{$data->tanggal_transaksi}}</td>
                  <td style="text-align:center">{{$data->pelanggan['rekening']}}</td>
                  <td style="text-align:center">{{$data->pelanggan['nama']}}</td>
                  <td style="text-align:center">{{$data->tagihan['tagihan']}}</td>
                  <td style="text-align:center">{{$data->pembayaran}}</td>
                  <td style="text-align:center">{{$data->kembalian}}</td>
              </tr>
          </tbody>
        </thead>

        <tbody>

    </table>

          <p style="margin-left: 50px;">STAFF</p>
          <br>
          <p style="margin-left: 40px;">(................)</p>



    </main>
  </body>
</html>

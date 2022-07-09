<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1 style="font-size: 16px; text-align: center;">
        TIKET WISATA
    </h1>
    <h1 style="font-size: 16px; text-align: center;">
        DESA WISATA PUSUR, KABUPATEN KLATEN
    </h1>
    <hr style="border: 3px solid; margin-bottom: 1px;">
    <hr style="margin-top: 0;">

    <h3 style="font-size: 16px; text-align: left;">Petunjuk</h1>
    <br>
    <ul>
      <p>1. Bawa / tunjukkan tiket pada saat melakukan kunjungan ke desa wisata</p>
      <p>2. Lakukan pembayaran sesuai dengan tagihan</p>
      <p>3. Selamat berwisata</p>
    </ul>
    <br>
        <div class="form-group">
            <table class="" align="center" style="width: 95%;">
                <tr>
                  <th scope="col">Kategori</th>
                  <th scope="col">Data</th>
                </tr>
                @foreach ($datas as $value)
                  <tr>
                    <th>Nama User</th>
                    <td>{{ $value->user->name}}</td>
                  </tr>
                  <tr>
                    <th>ID Pesanan</th>
                    <td>{{ $value->id }}</td>
                  </tr>
                  <tr>
                    <th>Nama Wisata</th>
                    <td>{{ $value->wisata->nama_wisata }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Kunjungan</th>
                    <td>{{ $value->Tanggal_Kunjungan }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah</th>
                    <td>{{ $value->jumlah }}</td>
                  </tr>
                  <tr>
                    <th>Tagihan</th>
                    <td>{{ $value->tagihan }}</td> -->
                  </tr>
                @endforeach
        </div>
</body>
</html>


      <!-- <div class="col-xl-6 ui-sortable">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
          <thead>
            <tr>
              <th scope="col">ID Pemesanan</th>
              <th scope="col">Nama</th>
              <th scope="col">Nama Wisata</th>
              <th scope="col">Fasilitas</th>
              <th scope="col">Tanggal Kunjungan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tagihan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datas as $value)
            <tr>
              <th>{{ $value->id }}</th>
              <td>{{ $value->user->name }}</td>
              <td>{{ $value->wisata_id }}</td>
              <td>
              @php
                  $hasil_split = explode(',', $value->fasilitas_id);
                @endphp
                @foreach($hasil_split as $h)
                  <div>{{ $h }}</div>
                @endforeach
              </td>
              <td>{{ $value->Tanggal_Kunjungan }}</td>
              <td>{{ $value->jumlah }}</td>
              <td>{{ $value->tagihan }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> -->

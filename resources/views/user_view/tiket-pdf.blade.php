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
        PUSUR INSTITUTE
    </h1>
    <h1 style="font-size: 16px; text-align: center;">
        KELURAHAN JEBRES KECAMATAN JEBRES
    </h1>
    <h1 style="font-size: 16px; text-align: center;">
        KABUPATEN KLATEN
    </h1>
    <h4 style="text-align: center; font-weight: normal; margin-bottom: 0;">
        JALAN KLATEN-JOGJA, KLATEN, Kec. KLATEN, KABUPATEN KLATEN, JAWA TENGAH
    </h4>
    <h4 style="text-align: center; font-weight: normal; margin: 0;">
        Telepon: 08988777788 Surel : pusur@mail.com Kode Pos : 5612
    </h4>
    <hr style="border: 3px solid; margin-bottom: 1px;">
    <hr style="margin-top: 0;">

    <h3 style="font-size: 16px; text-align: center;">Tiket Wisata</h1>
    <br>
        <div class="form-group">
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                  <th scope="col">ID Pemesanan</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nama Wisata</th>
                  <th scope="col">Tanggal Kunjungan</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Tagihan</th>
                </tr>
                @foreach ($datas as $value)
                  <tr>
                    <th>{{ $value->id }}</th>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->wisata->nama_wisata }}</td>
                    <td>{{ $value->Tanggal_Kunjungan }}</td>
                    <td>{{ $value->jumlah }}</td>
                    <td>{{ $value->tagihan }}</td>
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

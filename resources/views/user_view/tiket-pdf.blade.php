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
    @foreach($datas as $value)
    <div class="card mb-3">
          <div class="row g-0">
        <div class="col-md-4">
          <div class="card-body">
                      <h3 class="card-title" align="center">Tiket Wisata</h3>
                            <p class="card-text">
                                Nama     : {{$value->user->name}}
                                <br>
                                Wisata     : {{$value->wisata->nama_wisata}}
                                <br>
                                Tanggal    : {{$value->Tanggal_Kunjungan}}
                                <br>
                                Jumlah     : {{$value->jumlah}}
                                <br>
                                Tagihan    : {{$value->tagihan}}
                                <br>
                                Status     : {{$value->status_pemesanan}}
                            </p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-body">
            <h5 class="card-title" align="center">Rincian Pembayaran</h5>
             <table class="table" width="100%">
                <thead>
                    <tr>
                    <th scope="col">Harga Wisata</th>
                    <th scope="col">Harga Fasilitas</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{$value->wisata->harga}}</td>
                    <td>{{$value->fasilitas_id}}</td>
                    <td>{{$value->jumlah}}</td>
                    <td>{{$value->tagihan}}</td>
                    </tr>
                </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>

@endforeach
</body>
</html>


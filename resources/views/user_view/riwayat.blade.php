<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
      .container{
        margin-top: 70px;
      }
    </style>
  </head>
  <body>
  <div class="container" width="75%">
  <div class="col-xl-12 ui-sortable">
    <a type="button" href="{{url('user_view')}}" class="btn btn-success">Back</a>
    <br>
    <div class="table">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID Pemesanan</th>
            <th scope="col">Nama</th>
            <th scope="col">Nama Wisata</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Tanggal Kunjungan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tagihan</th>
            <th scope="col">Status Pemesanan</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($riwayat as $value)  
          <tr>
            <th scope="row">{{ $value->id}}</th>
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
            <td>{{ $value->status_pemesanan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
  </body>
</html>
    
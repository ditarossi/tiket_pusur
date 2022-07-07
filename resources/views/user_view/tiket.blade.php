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
            <th scope="col">Tanggal Kunjungan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tagihan</th>
            <th scope="col">Status Pemesanan</th>
            <th scope="col">Pengajuan Reschedule</th>
            <th scope="col">Pengajuan Refund</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tiket as $value)  
          <tr>
            <th scope="row">{{ $value->id}}</th>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->wisata->nama_wisata }}</td>
            <td>{{ $value->Tanggal_Kunjungan }}</td>
            <td>{{ $value->jumlah }}</td>
            <td>{{ $value->tagihan }}</td>
            <td>{{ $value->status_pemesanan }}</td>
            <td>{{ $value->reschedule }}</td>
            <td>{{ $value->refund }}</td>
            <td>
              
              @if($value->status_pemesanan == "Berhasil Pesan" && date('Y-m-d') < $value->Tanggal_Kunjungan)
                <div class="col-md-3">
                <a href="{{ url('pemesanan/'.$value->id.'/edit') }}">Reschedule</i></a>
                <a href="persetujuan/{{$value->id}}">Batalkan</a>
                <a href="cetak/{{$value->id}}">Cetak</a>
                </div>
              @else 
                <div class="col-md-3">
                <a class="btn btn-primary" href="cetak/{{$value->id}}">Cetak</a>
                </div>
              @endif
              <!-- <form action="{{ url('pemesanan/'.$value->id) }}" method="post">
                  @csrf 
                  <input type="hidden" name="_method" value="delete">
                  <button class=" btn-danger" type="submit" onclick="return confirm('Yakin ingin membatalkan pesanan ?')">Batal</button>
              </form> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
  </body>
</html>
    
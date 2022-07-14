<html>

<head>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('layout')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container{
        margin-top: 70px;
      }
      
      input[type="date"] {
        position: relative;
      }

      input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: auto;
        height: auto;
        color: transparent;
        background: transparent;
      }
      .img{
        margin-top: 50px;
      }
      .col-md-4{
        margin-top: 48px;
      }
    </style>
  </head>

<body>
  <div class="container">


    <div class="card mb-3" style="max-width: 1300px;">
      <div class="row g-0">
        <div class="col-md-4">
          <div class="mb-3">
                    <label>Nama Penerima</label>
                    <input name="" value="Muslim Afandi" class="form-control" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Nomor Rekening</label>
                    <input name="" value="980987868575 (Mandiri)" class="form-control" readonly></input>
                  </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" align="center">Upload Bukti Transaksi</h5>
              <form class="forms-sample" action="{{ url('pemesanan/'.$model->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                  <div class="mb-3">
                    <label>Nama Wisata</label>
                    <input name="wisata_id" value="{{$model->wisata->nama_wisata}}" class="form-control" id="wisata_id" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Tanggal Kunjungan</label>
                    <input name="Tanggal_Kunjungan" value="{{$model->Tanggal_Kunjungan}}" type="date" class="form-control" id="Tanggal_Kunjungan" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Jumlah</label>
                    <input name="jumlah" value="{{$model->jumlah}}" type="text" class="form-control" id="jumlah" oninput="myFunction()" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Tagihan</label>
                    <input value="{{$model->tagihan}}" name="tagihan" type="text" class="form-control" id="tagihan" readonly></input>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputConfirmPassword1">Foto</label>
                      <input value="{{ asset($model->bukti_transaksi) }}" name="bukti_transaksi" type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="bukti_transaksi">
                    </div>
                        <a href="{{url('riwayat_pemesanan')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" name="submit" class="btn btn-primary">Send message</button>
                  {{ csrf_field() }}
                </form>
          </div>
        </div>
      </div>
    </div>


</body>
</html>
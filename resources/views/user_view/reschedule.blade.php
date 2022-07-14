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
    </style>
  </head>
  <body>
  {{-- <div class="container" width="75%">
    <div class="col-xl-12 ui-sortable">
    <a type="button" href="{{url('riwayat_pemesanan')}}" class="btn btn-success">Back</a>
        <br>
        <form class="forms-sample" action="{{ url('pemesanan/'.$model->id) }}" method="post">
              @csrf
              <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="exampleInputUsername1">ID Pemesanan</label>
                    <input value="{{ $model->id }}" name="id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">ID User</label>
                    <input value="{{ $model->users_id }}" name="users_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">ID Wisata</label>
                    <input value="{{ $model->wisata_id }}" name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata" readonly>
                </div>
                <div class="mb-3">
                  <label>Tanggal Kunjungan</label>
                  <input name="Tanggal_Kunjungan" value="{{ $model->Tanggal_Kunjungan }}" type="date" class="form-control" id="Tanggal_Kunjungan"></input>
                </div>
                <div class="mb-3">
                  <label>Jumlah</label>
                  <input name="jumlah" value="{{ $model->jumlah }}" type="text" class="form-control" id="jumlah" readonly></input>
                </div>
                <div class="mb-3">
                  <label>Tagihan</label>
                  <input name="tagihan" value="{{ $model->tagihan }}" type="text" class="form-control" id="tagihan" readonly></input>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Send message</button>
                </div>
            </form>
    </div> --}}

<div class="container">
    <div class="card mb-3" style="max-width: 1300px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{asset('pict')}}/assets/img/features-3.svg" class="img-fluid rounded-start" alt="..." width="750px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" align="center">Reschedule Pemesanan</h5>
              <form class="forms-sample" action="{{ url('pemesanan/'.$model->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                  <div class="mb-3">
                    <label>Nama Wisata</label>
                    <input name="wisata_id" value="{{$model->wisata->nama_wisata}}" class="form-control" id="wisata_id" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Reschedule Tanggal Kunjungan</label>
                    <input name="Tanggal_Kunjungan" value="{{$model->Tanggal_Kunjungan}}" type="date" class="form-control" id="Tanggal_Kunjungan"></input>
                  </div>
                  <div class="mb-3">
                    <label>Jumlah</label>
                    <input name="jumlah" value="{{$model->jumlah}}" type="text" class="form-control" id="jumlah" oninput="myFunction()" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Tagihan</label>
                    <input value="{{$model->tagihan}}" name="tagihan" type="text" class="form-control" id="tagihan" readonly></input>
                  </div>
                        <a href="{{url('riwayat_pemesanan')}}" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" name="submit" class="btn btn-primary">Reschedule</button>
                  {{ csrf_field() }}
                </form>
          </div>
        </div>
      </div>
    </div>
</div>



    </body>
</html>

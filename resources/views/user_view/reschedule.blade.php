@extends('user_view.home_user')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="col-xl-6 ui-sortable">
<a type="button" href="{{url('tiket')}}" class="btn btn-outline-success">Back</a>
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
                <label>Fasilitas</label>
                <br>
                <input name="fasilitas_id[]" value="{{ $model->fasilitas_id }}" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata" readonly>
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
</div>
          @endsection
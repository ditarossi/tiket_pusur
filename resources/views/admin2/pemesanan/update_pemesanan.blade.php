@extends('admin2.v_template')
@section('title')
<title>Update Wisata</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pemesanan Update Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_pemesanan/'.$model->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                      <div class="form-group">
                      <label for="exampleInputUsername1">ID User</label>
                      <input value="{{ $model->users_id }}" name="users_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID User">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Wisata</label>
                      <input value="{{ $model->wisata_id }}" name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Tanggal Kunjungan</label>
                      <input value="{{ $model->Tanggal_Kunjungan }}" name="Tanggal Kunjungan" type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Kunjungan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah</label>
                      <input value="{{ $model->jumlah }}" name="jumlah" type="text" class="form-control" id="exampleInputPassword1" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tagihan</label>
                      <input value="{{ $model->tagihan }}" name="tagihan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tagihan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Status Pemesanan</label>
                      <input value="{{ $model->status_pemesanan }}" name="status_pemesanan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Status Pemesanan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pengajuan Reschedule</label>
                      <input value="{{ $model->reschedule }}" name="reschedule" type="text" class="form-control" id="exampleInputPassword1" placeholder="Pengajuan Reschedule">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pengajuan Refund</label>
                      <input value="{{ $model->refund }}" name="refund" type="text" class="form-control" id="exampleInputPassword1" placeholder="Pengajuan Refund">
                    </div>
                    {{-- <div class="form-check">
                      <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      <a href="#">Remember me</a>
                      <i class="input-helper"></i></label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                  </form>
                </div>
              </div>
            </div>
</div>
</div>
</div>
@endsection
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
                  <h4 class="card-title">Wisata Update Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_wisata/'.$model->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Wisata</label>
                      <input value="{{ $model->nama_wisata }}" name="nama_wisata" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Wisata">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input value="{{ $model->deskripsi }}" name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jam</label>
                      <input value="{{ $model->jam }}" name="jam" type="text" class="form-control" id="exampleInputPassword1" placeholder="Jam Kunjungan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kuota</label>
                      <input value="{{ $model->kuota }}" name="kuota" type="text" class="form-control" id="exampleInputPassword1" placeholder="Kuota">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input value="{{ $model->harga }}" name="harga" type="text" class="form-control" id="exampleInputPassword1" placeholder="Harga">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Keterangan</label>
                      <input value="{{ $model->keterangan }}" name="keterangan" type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="Keterangan">
                    </div> --}}
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Foto</label>
                      <input value="{{ asset($model->foto) }}" name="foto" type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="Foto">
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
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
                  <h4 class="card-title">Kegiatan Update Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_kegiatan/'.$model->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Kegiatan</label>
                      <input value="{{ $model->nama_kegiatan }}" name="nama_kegiatan" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input value="{{ $model->deskripsi }}" name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Foto</label>
                      <input value="{{ $model->foto }}" name="foto" type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="Foto">
                    </div>
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      <a href="#">Remember me</a>
                      <i class="input-helper"></i></label>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</div>
</div>
</div>
@endsection
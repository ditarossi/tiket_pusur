@extends('admin2.v_template')
@section('title')
<title>Create Wisata</title>
@endsection

@section('content')

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Wisata Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_wisata') }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Wisata</label>
                      <input name="nama_wisata" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Wisata">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kuota</label>
                      <input name="kuota" type="text" class="form-control" id="exampleInputPassword1" placeholder="Kuota">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input name="harga" type="text" class="form-control" id="exampleInputPassword1" placeholder="Harga">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="keterangan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Foto</label>
                      <input name="foto" type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="foto">
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
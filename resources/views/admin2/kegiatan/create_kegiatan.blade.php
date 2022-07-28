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
                  <h4 class="card-title">Kegiatan Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_kegiatan') }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Kegiatan</label>
                      <input name="nama_kegiatan" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Kegiatan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Foto</label>
                      <input name="foto" type="file" class="form-control" id="exampleInputConfirmPassword1" placeholder="foto">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    {{-- <button class="btn btn-light" href="{{url('/tbl_kegiatan')}}">Cancel</button> --}}
                  </form>
                </div>
              </div>
            </div>
</div>
</div>
</div>
@endsection
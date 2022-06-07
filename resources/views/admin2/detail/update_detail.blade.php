@extends('admin2.v_template')
@section('title')
<title>Update Detail</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Update Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_detail/'.$model->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Wisata</label>
                      <select value="{{ $model->wisata_id }}" name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata">
                        <option value="{{$model->wisata_id}}">{{ $model->wisata->nama_wisata }}</option>
                        @foreach ($wisatas as $item)
                        <option value="{{$item->id}}">{{$item->nama_wisata}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="#">Fasilitas</label>
                      <input value="{{ $model->fasilitas_id }}" name="fasilitas_id" type="text" class="form-control" id="#" placeholder="ID Fasilitas">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input value="{{ $model->deskripsi }}" name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Keterangan</label>
                      <input value="{{ $model->keterangan }}" name="keterangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Keterangan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Foto</label>
                      <input value="{{ $model->foto }}" name="foto" type="text" class="form-control" id="exampleInputPassword1" placeholder="Foto">
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
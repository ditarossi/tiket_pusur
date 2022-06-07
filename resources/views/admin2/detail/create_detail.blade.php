@extends('admin2.v_template')
@section('title')
<title>Create Detail</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_detail') }}" method="post">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Wisata</label>
                      <select name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata">
                        <option value=""> -- Pilih --</option>
                        @foreach ($wisatas as $item)
                        <option value="{{$item->id}}">{{$item->nama_wisata}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="#">Fasilitas</label>
                      <!-- <input name="fasilitas_id" type="text" class="form-control" id="#" placeholder="Fasilitas"> -->
                        @foreach ($fas as $f)
                        <div class="form-check form-check-inline">
                          <input name="fasilitas_id" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$f->id}}">
                          <label class="form-check-label" for="inlineCheckbox1">{{$f->fasilitas}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input name="deskripsi" type="text" class="form-control" id="exampleInputUsername1" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Keterangan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Foto</label>
                      <input name="foto" type="text" class="form-control" id="exampleInputPassword1" placeholder="Foto">
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
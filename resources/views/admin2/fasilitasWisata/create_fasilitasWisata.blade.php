@extends('admin2.v_template')
@section('title')
<title>Create Fasilitas Wisata</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fasilitas Wisata Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_fasilitasWisata') }}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label>Nama Wisata</label>
                        <select name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Wisata">
                            <option value=""> -- Pilih --</option>
                            @foreach ($wisata as $d)
                            <option value="{{$d->id}}">{{$d->nama_wisata}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                        <label>Fasilitas Wisata</label>
                            <select name="fasilitas_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="Fasilitas WIsata">
                                <option value=""> -- Pilih --</option>
                                @foreach ($fasi as $d)
                                <option value="{{$d->id}}">{{$d->fasilitas}}</option>
                                @endforeach
                            </select>
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
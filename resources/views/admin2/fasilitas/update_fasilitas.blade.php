@extends('admin2.v_template')
@section('title')
<title>Create Bukti Transaksi</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fasilitas Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_fasilitas/'.$model->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fasilitas</label>
                      <input value="{{ $model->fasilitas }}" name="fasilitas" type="text" class="form-control" id="exampleInputUsername1" placeholder="Fasilitas">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Harga</label>
                      <input value="{{ $model->harga }}" name="harga" type="text" class="form-control" id="exampleInputUsername1" placeholder="Harga">
                    </div>
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
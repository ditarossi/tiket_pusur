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
                  <h4 class="card-title">Bukti Transaksi Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_bukti') }}" method="post">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID User</label>
                      <input name="users_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID User">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Resi Pembayaran</label>
                      <input name="resi_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Resi Pembayaran">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Foto</label>
                      <input name="foto" type="text" class="form-control" id="exampleInputUsername1" placeholder="Foto">
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
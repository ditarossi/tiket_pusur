@extends('admin2.v_template')
@section('title')
<title>Create Tiket</title>
@endsection

@section('content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tiket Create Form</h4>
                  <form class="forms-sample" action="{{ url('tbl_tiket') }}" method="post">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Pemesanan</label>
                      <input name="pemesanan_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Pemesanan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID User</label>
                      <input name="users_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID User">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Resi Pembayaran</label>
                      <input name="resi_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Resi Pembayaran">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Bukti Transaksi</label>
                      <input name="bukti_transaksi_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Bukti Transaksi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Wisata</label>
                      <input name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="ID Wisata">
                    </div>
                    <div class="form-group">
                      <label for="#">Fasilitas</label>
                      <input name="fasilitas_id" type="text" class="form-control" id="#" placeholder="Fasilitas">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Tanggal Kunjungan</label>
                      <input name="Tanggal_Kunjungan" type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Kunjungan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah</label>
                      <input name="jumlah" type="text" class="form-control" id="exampleInputPassword1" placeholder="Kuota">
                    </div>
                      <label for="exampleInputPassword1">Status Pembayaran</label>
                      <input name="status_pembayaran" type="text" class="form-control" id="exampleInputPassword1" placeholder="Kuota">
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
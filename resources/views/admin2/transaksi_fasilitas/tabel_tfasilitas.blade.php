@extends('admin2.v_template')
@section('title')
<title>Tabel Tiket</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Resi Pembayaran</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Fasilitas</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>{{ $value->trx_id }}</td>
                            <td>{{ $value->fas->fasilitas }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
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
                            <th>ID Pemesanan</th>
                            <th>ID User</th>
                            <th>ID Wisata</th>
                            <th>ID Fasilitas</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                            <th>Status Pembayaran</th>
                            <th>Pengajuan Reschedule</th>
                            <th>Pengajuan Refund</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->nama_wisata }}</td>
                            <td>
                              @php
                                $hasil_split = explode(',', $value->fasilitas_id);
                                @endphp
                                @foreach($hasil_split as $h)
                                  <div>{{ $h }}</div>
                              @endforeach
                            </td>
                            <td>{{ $value->Tanggal_Kunjungan }}</td>
                            <td>{{ $value->jumlah }}</td>
                            <td>{{ $value->tagihan }}</td>
                            <td>{{ $value->status_pemesanan }}</td>
                            <td>{{ $value->reschedule }}</td>
                            <td>{{ $value->refund }}</td>
                            <!-- <td>
                              <a class="btn btn-outline-warning" href="{{ url('tbl_resi/'.$value->id.'/edit') }}">Update</a>
                              <form action="{{ url('tbl_resi/'.$value->id) }}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                              </form>
                            </td> -->
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
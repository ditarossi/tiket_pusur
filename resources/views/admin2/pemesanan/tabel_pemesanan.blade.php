@extends('admin2.v_template')
@section('title')
<title>Tabel Pemesanan</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Pemesanan</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_pemesanan/create') }}">Tambah Data</a>
                  <a class="btn btn-outline-primary" href="{{ route('laporan') }}">Cetak Laporan</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Kode Transaksi</th>
                            <th>ID User</th>
                            <th>ID Wisata</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                            <th>Status Pemesanan</th>
                            <th>Pengajuan Reschedule</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>
                              {{ $value->id }}
                            </td>
                            <td>
                              {{ $value->kode_tr }}
                            </td>
                            <td>
                              {{ $value->user->name }}
                            </td>
                            <td>
                              {{ $value->wisata->nama_wisata }}
                            </td>
                            <td>{{ $value->Tanggal_Kunjungan }}</td>
                            <td>{{ $value->jumlah }}</td>
                            <td>{{ $value->tagihan }}</td>
                            <td>{{ $value->status_pemesanan }}</td>
                            <td>{{ $value->reschedule }}</td>
                            <td>
                              {{-- <a class="btn btn-outline-warning" href="gantistatus/{{$value->id}}" onclick="return confirm('Yakin mengubah status pemesanan ?')">Ganti Status</a>
                              <a class="btn btn-outline-warning" href="gantirefund/{{$value->id}}" onclick="return confirm('Yakin mengubah status pemesanan ?')">Setuju Refund</a>
                              <a class="btn btn-outline-warning" href="selesai/{{$value->id}}" onclick="return confirm('Yakin mengubah status pemesanan ?')">Selesai</a>
                              <a class="btn btn-outline-warning" href="{{ url('tbl_pemesanan/'.$value->id.'/edit') }}">Update</a>
                              <form action="{{ url('tbl_pemesanan/'.$value->id) }}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</button>
                              </form> --}}
                              <div class="row">
                                  <div class="col-sm-5">
                                    <a class="btn btn-light" href="{{ url('tbl_pemesanan/'.$value->id.'/edit') }}"><i class="ti-pencil text-primary"></i></a>
                                  </div>
                                  <div class="col-sm-5">
                                    <form action="{{ url('tbl_pemesanan/'.$value->id) }}" method="post">
                                      @csrf 
                                      <input type="hidden" name="_method" value="delete">
                                      <button class="btn btn-light delete" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="ti-close text-danger"></i></button>
                                    </form> 
                                  </div>
                                </div>
                            </td>
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
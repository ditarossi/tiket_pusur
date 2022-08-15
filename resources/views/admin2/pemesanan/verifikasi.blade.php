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
                  {{-- <a class="btn btn-outline-success" href="{{ url('tbl_pemesanan/create') }}">Tambah Data</a> --}}
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
                            <th>Jam Kunjungan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                            <th>Status Pemesanan</th>
                            <th>Bukti Transaksi</th>
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
                            <td>{{ $value->jam }}</td>
                            <td>{{ $value->jumlah }}</td>
                            <td>{{ $value->tagihan }}</td>
                            <td>{{ $value->status_pemesanan }}</td>
                            @if($value->bukti_transaksi == "Belum Melakukan Transaksi")
                            {
                              <td>{{ $value->bukti_transaksi }}</td>
                            }
                            @else
                            <td>
                                <img src="{{ asset($value->bukti_transaksi) }}" alt="" width="40 px">
                            </td>
                            @endif
                            <td>
                              <a class="btn btn-light" href="gantistatus/{{$value->id}}" onclick="return confirm('Yakin mengubah status pemesanan ?')"><i class="ti-pencil text-primary"></i>Verifikasi</a>
                              {{-- <a class="btn btn-outline-warning" href="{{ url('tbl_pemesanan/'.$value->id.'/edit') }}">Update</a>
                              <form action="{{ url('tbl_pemesanan/'.$value->id) }}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</button>
                              </form> --}}
                              <a class="btn btn-light" href="detail_transaksi/{{$value->id}}"><i class="ti-eye text-info"></i>Detail</a>
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
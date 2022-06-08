@extends('admin2.v_template')
@section('title')
<title>Tabel Wisata</title>
@endsection

@section('content')
<!-- partial -->
@php
$data_fas = $dfas->keyBy('id')->toArray();
@endphp
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Wisata</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_wisata/create') }}">Tambah Data</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Nama Wisata</th>
                            <th>Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Kuota</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($datas as $value)
                          <tr>
                              <td>{{ $value->nama_wisata }}</td>
                              <td>
                                @php
                                $hasil_split = explode(',', $value->fasilitas_id);
                                @endphp
                                @foreach($hasil_split as $h)
                                  <div>{{ $h }}</div>
                                @endforeach
                              </td>
                              <td>{{ $value->deskripsi }}</td>
                              <td>{{ $value->kuota }}</td>
                              <td>{{ $value->harga }}</td>
                              <td>{{ $value->keterangan }}</td>
                              <td>
                                <img src="{{ asset($value->foto) }}" alt="" width="40 px">
                              </td>
                              <td>
                                <a class="btn btn-outline-warning" href="{{ url('tbl_wisata/'.$value->id.'/edit') }}">Update</a>
                                <form action="{{ url('tbl_wisata/'.$value->id) }}" method="post">
                                  @csrf 
                                  <input type="hidden" name="_method" value="delete">
                                  <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</button>
                                </form>
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
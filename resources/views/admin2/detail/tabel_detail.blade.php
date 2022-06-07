@extends('admin2.v_template')
@section('title')
<title>Tabel Detail</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Detail</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_detail/create') }}">Tambah Data</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID Wisata</th>
                            <th>ID Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>
                              {{ $value->wisata->nama_wisata }}
                            </td>
                            <td>
                              {{ $value->fasilitas->fasilitas }}
                            </td>
                            <td>{{ $value->deskripsi }}</td>
                            <td>{{ $value->keterangan }}</td>
                            <td>{{ $value->foto }}</td>
                            <td>
                              <a class="btn btn-outline-warning" href="{{ url('tbl_detail/'.$value->id.'/edit') }}">Update</a>
                              <form action="{{ url('tbl_detail/'.$value->id) }}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
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
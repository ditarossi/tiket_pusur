@extends('admin2.v_template')
@section('title')
<title>Tabel Kegiatan</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Wisata</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_kegiatan/create') }}">Tambah Data</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($datas as $value)
                          <tr>
                              <td>{{ $value->nama_kegiatan }}</td>
                              <td>{{ $value->deskripsi }}</td>
                              <td>
                                <img src="{{ asset($value->foto) }}" alt="" width="40 px">
                              </td>
                              <td>
                                {{-- <a class="btn btn-outline-warning" href="{{ url('tbl_kegiatan/'.$value->id.'/edit') }}">Update</a>
                                
                                <form action="{{ url('tbl_kegiatan/'.$value->id) }}" method="post">
                                  @csrf 
                                  <input type="hidden" name="_method" value="delete">
                                  <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</button>
                                </form> --}}
                                <div class="row">
                                  <div class="col-sm-5">
                                    <a class="btn btn-light" href="{{ url('tbl_kegiatan/'.$value->id.'/edit') }}"><i class="ti-pencil text-primary"></i>Edit</a>
                                  </div>
                                  <div class="col-sm-5">
                                    <form action="{{ url('tbl_kegiatan/'.$value->id) }}" method="post">
                                      @csrf 
                                      <input type="hidden" name="_method" value="delete">
                                      <button class="btn btn-light delete" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="ti-close text-danger"></i>Hapus</button>
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
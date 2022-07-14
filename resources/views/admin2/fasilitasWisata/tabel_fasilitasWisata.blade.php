@extends('admin2.v_template')
@section('title')
<title>Tabel Fasilitas Wisata</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Fasilitas Wisata</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_fasilitasWisata/create') }}">Tambah Data</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Wisata</th>
                            <th>Fasilitas</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>{{ $value->wisata->nama_wisata }}</td>
                            <td>{{ $value->fasilitas->fasilitas }}</td>
                            <td>
                              {{-- <form action="{{ url('tbl_fasilitasWisata/'.$value->id) }}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Delete</button>
                              </form> --}}
                              <div class="row">
                                  <div class="col-sm-5">
                                    <form action="{{ url('tbl_fasilitasWisata/'.$value->id) }}" method="post">
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
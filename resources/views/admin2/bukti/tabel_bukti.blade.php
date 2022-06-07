@extends('admin2.v_template')
@section('title')
<title>Tabel Bukti Transaksi</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Bukti Transaksi</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                  <a class="btn btn-outline-success" href="{{ url('tbl_bukti/create') }}">Tambah Data</a>
                    <br>
                    <br>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID User</th>
                            <th>ID Resi Pembayaran</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datas as $value)
                        <tr>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->resi_id }}</td>
                            <td>{{ $value->foto }}</td>
                            <td>
                              <a class="btn btn-outline-warning" href="{{ url('tbl_bukti/'.$value->id.'/edit') }}">Update</a>
                              <form action="{{ url('tbl_bukti/'.$value->id) }}" method="post">
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
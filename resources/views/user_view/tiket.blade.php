@extends('user_view.home_user')
@section('content')

<br>
<br>
<br>
<br>
<br>
<br>

<div class="col-xl-6 ui-sortable">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Nama Wisata</th>
        <th scope="col">Fasilitas</th>
        <th scope="col">Tanggal Kunjungan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Tagihan</th>
        <th scope="col">Cetak Tiket</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tiket as $value)
      <tr>
        <th scope="row">1</th>
        <td>{{ $value->user->name }}</td>
        <td>{{ $value->wisata->nama_wisata }}</td>
        <td>{{ $value->wisata->fas->fasilitas }}</td>
        <td>{{ $value->Tanggal_Kunjungan }}</td>
        <td>{{ $value->jumlah }}</td>
        <td>{{ $value->tagihan }}</td>
        <td><a class="btn btn-primary" href="cetak">Cetak</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
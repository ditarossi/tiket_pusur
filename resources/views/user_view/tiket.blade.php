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
        <th scope="col">ID Pemesanan</th>
        <th scope="col">Nama</th>
        <th scope="col">Nama Wisata</th>
        <th scope="col">Fasilitas</th>
        <th scope="col">Tanggal Kunjungan</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Tagihan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tiket as $value)      
      <tr>
        <th scope="row">{{ $value->id}}</th>
        <td>{{ $value->user->name }}</td>
        <td>{{ $value->wisata->nama_wisata }}</td>
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
        <td>
          <a type="button" class=" btn-primary" href="cetak">Cetak</a>
          <a type="button" class=" btn-warning" href="cetak">Reschedule</a>
          <a type="button" class=" btn-danger" href="cetak">Batal</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
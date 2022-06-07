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
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $value)
      <tr>
        <th scope="row">1</th>
        <td>{{ $value->user->name }}</td>
        <td>{{ $value->wisata->nama_wisata }}</td>
        <td>{{ $value->wisata->fasilitas->fasilitas }}</td>
        <td>{{ $value->Tanggal_Kunjungan }}</td>
        <td>{{ $value->jumlah }}</td>
        <td>{{ $value->tagihan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
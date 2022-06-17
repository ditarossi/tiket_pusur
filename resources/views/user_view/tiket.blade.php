@extends('user_view.home_user')
@section('content')
<br>
<br>
<br>
<br>
<br>
    <div class="col-xl-12 ui-sortable">
    <a type="button" href="{{url('user_view')}}" class="btn btn-outline-success">Back</a>
    <br>
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
            <th scope="col">Status Pemesanan</th>
            <th scope="col">Pengajuan Reschedule</th>
            <th scope="col">Pengajuan Refund</th>
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
            <td>{{ $value->status_pemesanan }}</td>
            <td>{{ $value->reschedule }}</td>
            <td>{{ $value->refund }}</td>
            <td>
              <a class=" btn-primary" href="cetak">Cetak</a>
              <a class=" btn-warning" href="{{ url('pemesanan/'.$value->id.'/edit') }}">Reschedule</a>
              <a class=" btn-danger" href="persetujuan/{{$value->id}}">Refund</a>
              <!-- <form action="{{ url('pemesanan/'.$value->id) }}" method="post">
                  @csrf 
                  <input type="hidden" name="_method" value="delete">
                  <button class=" btn-danger" type="submit" onclick="return confirm('Yakin ingin membatalkan pesanan ?')">Batal</button>
              </form> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!--MODAL-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pemesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="forms-sample" action="{{ url('pemesanan') }}" method="post">
            @csrf
              <div class="mb-3">
                <label>Nama Wisata</label>
                <select name="wisata_id" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nama Wisata">
                  <option value="{{ $value->wisata->nama_wisata }}"></option>
                </select>
              </div>
              <div class="mb-3">
                <label>Fasilitas</label>
                <br>
                  <input name="fasilitas_id[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="">
                  <label class="form-check-label" for="inlineCheckbox1"></label>
              </div>
              <div class="mb-3">
                <label>Tanggal Kunjungan</label>
                <input name="Tanggal_Kunjungan" type="date" class="form-control" id="Tanggal_Kunjungan"></input>
              </div>
              <div class="mb-3">
                <label>Jumlah</label>
                <input name="jumlah" type="text" class="form-control" id="jumlah"></input>
              </div>
              <div class="mb-3">
                <label>Tagihan</label>
                <input name="tagihan" type="text" class="form-control" id="tagihan"></input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
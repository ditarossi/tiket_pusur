@extends('admin2.v_template')
@section('title')
<title>Tabel Pemesanan</title>
@endsection

@section('content')
<div class="main-panel">
    <div class="card">
    <div class="content-wrapper">
    <div class="card mb-3" style="max-width: 1300px;">
      <div class="row g-0">
        @foreach($datas as $value)
        <div class="col-md-4">
          @if($value->bukti_transaksi == "Belum Melakukan Transaksi")
            
                {{ $value->bukti_transaksi }}
            @else
            <img src="{{ asset($value->bukti_transaksi) }}" alt="" width="300px">
            @endif
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" align="center">Form Pemesanan</h5>
              <form class="forms-sample" action="{{ url('tbl_pemesanan/'.$value->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                  <div class="mb-3">
                    <label>ID Pemesan</label>
                    <input name="wisata_id" value="{{$value->id}}" class="form-control" id="wisata_id" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Nama Pemesan</label>
                    <input name="wisata_id" value="{{$value->user->name}}" class="form-control" id="wisata_id" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Nama Wisata</label>
                    <input name="wisata_id" value="{{$value->wisata->nama_wisata}}" class="form-control" id="wisata_id" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Tanggal Kunjungan</label>
                    <input name="Tanggal_Kunjungan" value="{{$value->Tanggal_Kunjungan}}" type="date" class="form-control" id="Tanggal_Kunjungan" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Jumlah</label>
                    <input name="jumlah" value="{{$value->jumlah}}" type="text" class="form-control" id="jumlah" oninput="myFunction()" readonly></input>
                  </div>
                  <div class="mb-3">
                    <label>Tagihan</label>
                    <input value="{{$value->tagihan}}" name="tagihan" type="text" class="form-control" id="tagihan" readonly></input>
                  </div>
                        <a href="{{url('/verifikasi')}}" type="button" class="btn btn-secondary">Close</a>
                  {{ csrf_field() }}
                </form>
          </div>
        </div>
            @endforeach
      </div>
    </div>
        </div>
    </div>
</div>
@endsection
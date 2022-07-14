@extends('admin2.v_template')
@section('title')
<title>Tabel Pemesanan</title>
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Cetak Data Pemesanan</h4>
              <form action="laporan" method="post">
              @csrf
              <div class="row">
                <div class="col-6"></div>
                    <div class="form-group">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"/>
                        <!-- <input name="tanggal_awal" id="tanggal_awal" type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Awal"> -->
                    </div>
                </div>
                <div class="col-6"></div>
                    <div class="form-group">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"/>
                        <!-- <input name="tanggal_akhir" id="tanggal_akhir" type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Akhir"> -->
                    </div>
                </div>
                <button class="btn btn-success" type="submit" name="submit" value="table">Search</button>
                </form>
              </div>
            
            @isset($data)
  <div class="panel panel-inverse">
    <br>

    <div class="panel-body">
      <center><h4> Laporan Transaksi</h4></center>
      <a href="cetaklaporan/{{ $startDate }}/{{ $endDate }}" class="btn btn-secondary btn-sm float-right mr-4"><i class="fa fa-print fa-fw"></i> Cetak Laporan </a>
      <br>
      
    <div class="form-group my-5">
    
    <table id="rekaps" class="table table-bordered my-5" align="center" rules="all" border="1px" style="width: 95%; margin-top: 1 rem;
    margin-bottom: 1 rem;">
      <tr>
      <th>ID User</th>
                            <th>ID Wisata</th>
                            <!-- <th>ID Fasilitas</th> -->
                            <th>Tanggal Kunjungan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                            <th>Status Pemesanan</th>
                            <th>Pengajuan Reschedule</th>
                            <th>Pengajuan Refund</th>
                            </tr>
                            @foreach ( $data as $value)
                            <tr>
                          <td>
                              {{ $value->user->name }}
                            </td>
                            <td>
                              {{ $value->wisata->nama_wisata }}
                            </td>
                            <!-- <td>
                                @php
                                $hasil_split = explode(',', $value->fasilitas_id);
                                @endphp
                                @foreach($hasil_split as $h)
                                  <div>{{ $h }}</div>
                                @endforeach
                            </td> -->
                            <td>{{ $value->Tanggal_Kunjungan }}</td>
                            <td>{{ $value->jumlah }}</td>
                            <td>{{ $value->tagihan }}</td>
                            <td>{{ $value->status_pemesanan }}</td>
                            <td>{{ $value->reschedule }}</td>
                            <td>{{ $value->refund }}</td>
      </tr> 
      @endforeach
    </div>

    </div>


</div>

          </div>
          
        </div>
        </div>


        
@endisset
@endsection

@push('scripts')

<script>

  $(document).ready(function(){
      var table = $('#rekaps').DataTable({
      pageLength: 10,
      processing: true,
      serverSide: false,
      dom: 'Blfrtip',
      });

  });
</script>
@endpush
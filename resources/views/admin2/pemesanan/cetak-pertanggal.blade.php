<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Preview Laporan Data Pemesanan</h4>
              <div class="row">
                <div class="col-12"></div>
                  <div class="table-responsive">
                    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                      <thead>
                        <tr>
                            <th>User</th>
                            <th>Wisata</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jumlah</th>
                            <th>Tagihan</th>
                            <th>Status Pemesanan</th>
                            <th>Pengajuan Reschedule</th>
                            <th>Pengajuan Refund</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>
                              {{ $value->user->name }}
                            </td>
                            <td>
                              {{ $value->wisata->nama_wisata }}
                            </td>
                            <td>{{ $value->Tanggal_Kunjungan }}</td>
                            <td>{{ $value->jumlah }}</td>
                            <td>{{ $value->tagihan }}</td>
                            <td>{{ $value->status_pemesanan }}</td>
                            <td>{{ $value->reschedule }}</td>
                            <td>{{ $value->refund }}</td>
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
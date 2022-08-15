<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @yield('title')
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{asset('dashboard2')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{asset('dashboard2')}}/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('dashboard2')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    .col-md-4{
      padding: 10px;
    }
  </style>
</head>
<body>
    <div class="container" align="center">
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            {{-- <a type="button" href="{{url('pemesanan')}}" class="btn btn-light"><i class="ti ti-arrow-left"></i> Back</a> --}}
            <div class="card-body">
              <div class="row">
                <div class="col-12"></div>
                   @foreach($data_tr as $value)
                <div class="row">
                  <label for="exampleInputUsername1">Nama Wisata</label>
                  <input type="text" class="form-control" value="{{$value->wisata->nama_wisata}}" readonly>
                </div>
                <div class="row">
                  <label for="exampleInputUsername1">Tanggal Kunjungan</label>
                  <input type="text" class="form-control" value="{{$value->Tanggal_Kunjungan}}" readonly>
                </div>
                <div class="row">
                  <label for="exampleInputUsername1">Jam Kunjungan</label>
                  <input type="text" class="form-control" value="{{$value->jam}}" readonly>
                </div>
                @endforeach
                    <div class="row">
                      <div class="col-md-4">
                        <label for="exampleInputUsername1">Tiket Terpesan</label>
                        <input type="text" class="form-control" value=<?php echo $terpesan; ?> readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputUsername1">Sisa Tiket</label>
                        <input type="text" class="form-control" value=<?php echo $sisa; ?> readonly>
                      </div>
                     @if($sisa > 0)
                      <div class="col-md-4">
                        <label for="exampleInputUsername1">Keterangan</label>
                        <input type="text" class="form-control" value="Tersedia" readonly>
                      </div>
                      @else
                      <div class="col-md-3">
                        <label for="exampleInputUsername1">Keterangan</label>
                        <input type="text" class="form-control" value="Tidak Tersedia" readonly>
                      </div>
                      @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

         <!-- plugins:js -->
  <script src="{{asset('dashboard2')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('dashboard2')}}/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="{{asset('dashboard2')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{asset('dashboard2')}}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{asset('dashboard2')}}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{asset('dashboard2')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{asset('dashboard2')}}/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('dashboard2')}}/js/off-canvas.js"></script>
  <script src="{{asset('dashboard2')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('dashboard2')}}/js/template.js"></script>
  <script src="{{asset('dashboard2')}}/js/settings.js"></script>
  <script src="{{asset('dashboard2')}}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('dashboard2')}}/js/data-table.js"></script>
  <script src="{{asset('dashboard2')}}/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="{{asset('dashboard2')}}/js/dashboard.js"></script>
  <script src="{{asset('dashboard2')}}/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>
</html>
<html>
  <head>
    <!-- CSS TEMPLATE GAMBAR -->
    <!-- Favicons -->
    <link href="{{asset('pict')}}/assets/img/favicon.png" rel="icon">
    <link href="{{asset('pict')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{asset('pict')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <!-- <link href="{{asset('pict')}}/assets/vendor/aos/aos.css" rel="stylesheet"> -->
    <!-- <link href="{{asset('pict')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{asset('pict')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('pict')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <link href="{{asset('pict')}}/assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
      .container{
        margin-top: 70px;
      }
      .row .col-sm-6{
        padding: 10px;
      }
      .row .col-sm-12{
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="portfolio">
        <div class="container" align="center" width="95%">
        <div class="row">
            <div class="col-lg-12">
            <ul id="portfolio-flters">
                 <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">Dalam Proses</li>
                <li data-filter=".filter-card">Riwayat Pemesanan</li>
            </ul>
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <!--PERULANGAN SEDANG PROSES-->  

            <div class="portfolio-wrap filter-app" >
                @foreach($tiket as $value)
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="card text-dark bg-light">
                        <div class="card-body">
                            <h5 class="card-title">{{$value->user->name}}</h5>
                            <p class="card-text">
                                Wisata     : {{$value->wisata->nama_wisata}}
                                <br>
                                Tanggal    : {{$value->Tanggal_Kunjungan}}
                                <br>
                                Jumlah     : {{$value->jumlah}}
                                <br>
                                Tagihan    : {{$value->tagihan}}
                                <br>
                                Status     : {{$value->status_pemesanan}}
                            </p>
                            @if($value->status_pemesanan == "Berhasil Pesan" && date('Y-m-d') < $value->Tanggal_Kunjungan && $value->reschedule != "Berhasil Reschedule")
                                <a class="btn btn-warning" href="{{ url('pemesanan/'.$value->id.'/edit') }}">Reschedule</i></a>
                                <a class="btn btn-danger" href="persetujuan/{{$value->id}}">Batalkan</a>
                                <a class="btn btn-primary" href="cetak/{{$value->id}}">Cetak</a>
                            @endif
            
                        </div>
                        </div>
                    </div>
                </div> --}}


                <div class="card mb-3" style="max-width: 1300px;">
      <div class="row g-0">
        <div class="col-md-4">
          <div class="card-body">
                      <h5 class="card-title">{{$value->user->name}}</h5>
                            <p class="card-text">
                                Wisata     : {{$value->wisata->nama_wisata}}
                                <br>
                                Tanggal    : {{$value->Tanggal_Kunjungan}}
                                <br>
                                Jumlah     : {{$value->jumlah}}
                                <br>
                                Tagihan    : {{$value->tagihan}}
                                <br>
                                Status     : {{$value->status_pemesanan}}
                            </p>
                            @if($value->status_pemesanan == "Berhasil Pesan" && date('Y-m-d') < $value->Tanggal_Kunjungan && $value->reschedule != "Berhasil Reschedule")
                                <a class="btn btn-warning" href="{{ url('pemesanan/'.$value->id.'/edit') }}">Reschedule</i></a>
                                <a class="btn btn-danger" href="persetujuan/{{$value->id}}">Batalkan</a>
                                <a class="btn btn-primary" href="cetak/{{$value->id}}">Cetak</a>
                            @elseif($value->status_pemesanan =="Menunggu Verifikasi")
                              <a class="btn btn-primary" href="#">Upload Bukti Bayar</a>
                            @endif
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" align="center">Rincian Pembayaran</h5>
             <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Harga Wisata</th>
                    <th scope="col">Harga Fasilitas</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{$value->wisata->harga}}</td>
                    <td>{{$value->fasilitas_id}}</td>
                    <td>{{$value->jumlah}}</td>
                    <td>{{$value->tagihan}}</td>
                    </tr>
                </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>


                @endforeach
            </div>


            <!--PERULANGAN RIWAYAT-->

            <div class="portfolio-wrap filter-card" >
                @foreach($riwayat as $value)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card text-white bg-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{$value->user->name}}</h5>
                            <p class="card-text">
                                Wisata     : {{$value->wisata->nama_wisata}}
                                <br>
                                Tanggal    : {{$value->Tanggal_Kunjungan}}
                                <br>
                                Jumlah     : {{$value->jumlah}}
                                <br>
                                Tagihan    : {{$value->tagihan}}
                                <br>
                                Status     : {{$value->status_pemesanan}}
                            </p>
                            @if($value->status_pemesanan == "Berhasil Pesan" && date('Y-m-d') < $value->Tanggal_Kunjungan)
                                <a class="btn btn-warning" href="{{ url('pemesanan/'.$value->id.'/edit') }}">Reschedule</i></a>
                                <a class="btn btn-danger" href="persetujuan/{{$value->id}}">Batalkan</a>
                                <a class="btn btn-primary" href="cetak/{{$value->id}}">Cetak</a>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

<!-- SCRIPT TEMPLATE GAMBAR -->
  <!-- Vendor JS Files -->
  <script src="{{asset('pict')}}/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('pict')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('pict')}}/assets/js/main.js"></script>
  </body>
</html>
    
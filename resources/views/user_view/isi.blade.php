@extends('user_view.home_user')
@section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Pusur Institute</h2>
                    <p>Merupakan wadah kolaborasi parapihak yang memiliki kepedulian terhadap pelestarian Sungai Pusur.
                    Penggunaan istilah Institut adalah untuk memfokuskan wadah yang khusus bergerak dalam pelestarian Sungai Pusur
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="#contact">Instagram<i class="fab fa-apple"></i></a>
                    </div>
                    <div class="white-button scroll-to-section">
                      <a href="#contact">WhatsApp<i class="fab fa-google-play"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('layout')}}/assets/images/slider-dec.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <main id="main">
<!-- ======= Portfolio Section ======= -->
  <section class="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Wisata</li>
              <li data-filter=".filter-card">Kegiatan</li>
              <!-- <li data-filter=".filter-web">Web</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

        @foreach($datas as $d)
          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app" >
            <div class="portfolio-item">
              <img src="{{ asset($d->foto) }}" class="img-fluid" alt="" height="120px">
              <div class="portfolio-info">
                <h3>{{ $d->nama_wisata }}</h3>
                <div>
                  <a href="{{ asset($d->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $d->nama_wisata }}"><i class="bx bx-plus"></i></a>
                  <a href="#modal" data-bs-toggle="modal" data-bs-target="#showdetail{{$d->id}}"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @foreach($keg as $k)
          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card" >
            <div class="portfolio-item">
              <img src="{{ asset($k->foto) }}" class="img-fluid" alt="" height="120px">
              <div class="portfolio-info">
                <h3>{{ $k->nama_kegiatan }}</h3>
                <div>
                  <a href="{{ asset($k->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $k->nama_kegiatan }}"><i class="bx bx-plus"></i></a>
                  <a href="#modal" data-bs-toggle="modal" data-bs-target="#showdetail2{{$k->id}}"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>

      </div>
  </section><!-- End Portfolio Section -->
</main>


@foreach($datas as $d)
        <!-- <div class="col-lg-4">
          <div class="pricing-item-regular">
            <div class="icon">
              <img src="{{ asset($d->foto) }}" alt="" width="100 px">
            </div>
            <ul>
              <h4>{{$d->nama_wisata}}</h4>
              <li class="function">Harga Tiket = {{$d->harga}}</li>
              <li class="function">Sisa Kuota = {{$d->kuota}}</li>
            </ul>
            <div class="border-button">
              <a href="#modal" data-bs-toggle="modal" data-bs-target="#showdetail{{$d->id}}">Show Detail</a>
            </div>
          </div>
        </div> -->

        <!--MODAL SHOW DETAIL-->
        <div class="modal fade bd-example-modal-lg" id="showdetail{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$d->nama_wisata}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                        <img src="{{ asset($d->foto) }}" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                    <h3>{{$d->nama_wisata}}</h3>
                    <ul>
                        <li><strong>Fasilitas</strong>: {{$d->fasilitas}}</li>
                        <li><strong>Kuota</strong>: {{$d->kuota}}</li>
                        <li><strong>Harga</strong>: {{$d->harga}}</li>
                        <li><strong>Keterngan</strong>: {{$d->keterangan}}</a></li>
                    </ul>
                    </div>
                    <div class="portfolio-description">
                    <h2>Deskripsi</h2>
                    <p>
                        {{$d->deskripsi}}
                    </p>
                    </div>
                </div>

                </div>

            </div>
            </section>

                </div>               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button href="#modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" type="button" class="btn btn-primary">Order Now</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach


        <!--SHOW DETAIL2-->
        @foreach($keg as $k)
        <!--MODAL SHOW DETAIL-->
        <div class="modal fade bd-example-modal-lg" id="showdetail2{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$k->nama_wisata}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                        <img src="{{ asset($k->foto) }}" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- <div class="portfolio-info">
                    <h3>{{$k->nama_kegiatan}}</h3>
                    </div> -->
                    <div class="portfolio-info">
                    <h2>Deskripsi</h2>
                    <p>
                        {{$k->deskripsi}}
                    </p>
                    </div>
                </div>

                </div>

            </div>
            </section>

                </div>               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button href="#modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" type="button" class="btn btn-primary">Order Now</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach


  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Wisata</h4>
            <img src="{{asset('layout')}}/assets/images/heading-line-dec.png" alt="">
            <p>
              wisata adalah bepergian secara bersama-sama dengan tujuan untuk bersenang-senang, menambah pengetahuan, dan lain-lain. Selain itu juga dapat diartikan sebagai bertamasya atau piknik.
            </p>
          </div>
        </div>

      </div>
      <!-- ======= About Section ======= -->
      <section class="about" data-aos="fade-up">
          <div class="container">

            <div class="row">
              <div class="col-lg-6">
                <img src="{{asset('pict')}}/assets/img/about.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0">
                <h3>Bagaimana cara melakukan pemesanan wisata ?</h3>
                <ul>
                  <li><i class="bi bi-check2-circle"></i> Melakukan registrasi sebagai user</li>
                  <li><i class="bi bi-check2-circle"></i> Login ke sistem, dengan menggunakan email dan password yang sama ketika user melakukan registrasi</li>
                  <li><i class="bi bi-check2-circle"></i> Memilih menu pemesanan, kemudian mengisikan form sesuai dengan kebutuhan</li>
                  <li><i class="bi bi-check2-circle"></i> Memilih menu user, kemudian memilih lihat tiket, untuk mendapatkan informasi pemesanan</li>
                  <li><i class="bi bi-check2-circle"></i> Menunggu hingga status pemesanan berubah menjadi berhasil pesan</li>
                  <li><i class="bi bi-check2-circle"></i> Datang ke tempat wisata, kemudian tunjukkan e-tiket yang sudah didapatkan bisa melalui sistem/file .pdf</li>
                </ul>
              </div>
            </div>

          </div>
        </section><!-- End About Section -->
    </div>
  </div> 

  <div id="order" class="order-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading" align="center">
            <h4>Pemesanan Wisata</h4>
            <img src="{{asset('layout')}}/assets/images/heading-line-dec.png" alt="">
            <div class="border-button">
              <a href="#modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Order Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL -->
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
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
                <option value=""> -- Pilih --</option>
                @foreach ($datas as $d)
                <option value="{{$d->id}}">{{$d->nama_wisata}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label>Fasilitas</label>
              <br>
              @foreach ($f as $d)
                <input name="fasilitas_id[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$d->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$d->fasilitas}}</label>
              @endforeach
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
  
  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Visi</h4>
            <img src="{{asset('layout')}}/assets/images/heading-line-dec.png" alt="">
            <p>Harmonisasi Berbagai Kepentingan Terhadap Pelestarian Sub-das Pusur</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Sejarah</h4>
            <p>13 Februari 2016, “Grebeg Sungai”  inisiatif Pemerintah Kec. Polanharjo sebagai momentum aksi kolektif.“ dan dimulainya cikal bakal PUSUR INSTITUTE</p>
            <div class="text-button">
              <a data-bs-toggle="modal" data-bs-target="#showsejarah">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
         <!-- Modal -->
         <div class="modal fade bd-example-modal-lg" id="showsejarah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sejarah Pusur Institute</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Pusur Institute adalah wadah kolaborasi parapihak yang memiliki kepedulian terhadap pelestarian sungai Pusur. 
                  Penggunaan istilah institute adalah untuk memfokuskan wadah yang khusus bergerak dalam pelestarian sungai pusur.
                  Kesamaan Misi dari parapihak  yg bergiat. Semua pihak memiliki aktifitas yang bermuara terhadap pelestarian sungai Pusur.
                </p>
                <br>
                <p>
                  Kegiatan Beragam dari Hulu ke Hilir  dan masih  parsial:  
                    <li>1. Konservasi hulu </li>
                    <li>2. Bank Sampah </li>
                    <li>3. Pertanian ramah lingkungan </li>
                    <li>4. River care/RTPA </li>
                    <li>5. Kampung energi </li>
                    <li>6. Sanitasi </li>
                </p>
                <br>
                <p>
                  5 tahun, sejak 2012 Fokus kegiatan Ke badan Sungai (Grebeg Sungai) & Kegiatan di sempadan sungai seperti pertanian ramah lingkungan, bank sampah, penelitian penyadartahuan, & konservasi di Hulu
                  13 Februari 2016, “Grebeg Sungai”  inisiatif Pemerintah Kec. Polanharjo sebagai momentum aksi kolektif.“ dan dimulainya cikal bakal PUSUR INSTITUTE
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Struktur Organisasi</h4>
            <p>Pemerintah Kecamatan Polanharjo, LPTP Surakarta, Komunitas Peduli Sungai Bank Sampah dan Petani, Gita Pertiwi,
              Lestari, SSK, PT. TIV Klaten, Akademisi UNS & UGM</p>
            <div class="text-button">
              <a data-bs-toggle="modal" data-bs-target="#showso">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="showso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Struktur Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="{{asset('layout')}}/assets/images/Picture1.png" alt="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Kegiatan</h4>
            <p>Program kali bersih melalui pengelolaan sampah terpadu di 4 desa,
            Program River Care melalui pengembangan wisata tubing, Sekolah Lapang Petani/ Pendidikan Pertanian</p>
            <div class="text-button">
              <a data-bs-toggle="modal" data-bs-target="#showkegiatan">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="showkegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h6>1. Program Kali Bersih melalui Pengelolaan Sampah Terpadu di 4 Desa</h6>
                <p>
                  Melalui program ini sudah terbentuk 7 bank sampah, dengan nasabah yang sudah mencapai sekitar kurang lebih 480 nasabah
                  Kegiatan yang dilakukan berupa penampungan sampah, pemilahan sampah, kreasi daur ulang, promosi produk daur ulang, 
                  kampanye penyadartahuan, capacity building dan grebeg kali pusur.
                </p>
                <br>
                <h6>2. Program River Care melalui Pengembangan Wisata Tubing </h6>
                <p>
                  Program ini berawal dari inisiatif 10 pemuda pada tahun 2012, yang pada saat ini sudah memiliki 35 anggota.
                  Kegiatan utama yang dilakukan adalah melakukan pelestarian ungai Pusur dengan pengelolaan wisata tubing.
                  Adapun pemeliharaan rutin yang dilakukan antara lain menjadikan jalur tubing dengan bersih sampah, 
                  penataan jalur/track, penataan bantaran sungai, melibatkan dampak ekonomi bagi ibu-ibu sekitar bantaran 
                  sungai dengan dukungan snack/rebusan untuk tamu wisata.
                </p>
                <br>
                <h6>3. Sekolah Lapang Petani/Pusat Pendidikan Pertanian</h6>
                <p>
                  Merupakan kegiatan yang dilakukan sebagai sarana belajar petani yang meliputi 2 pusat pelatihan/lab lapang pertanian.
                  Tujuan kegiatan ini adalah menciptakan kader petani yang unggul dengan begini maka polutan sungai akibat kegiatan pertanian bisa berkurang.
                </p>
                <br>
                <h6>4. Gabungan Perkumpulan Petani Pemakai Air (GP3A) DI Plosowareng</h6>
                <p>
                  Merupakan komunitas yang memiliki tugas untuk membagi air ketika musim kemarau datang yang meliputi
                  kontrol dan monitoring drainase primer, skunder dan tersier.
                  Komunitas ini berfokus pada pengelolaan daerah irigasi (DI) Plosowareng dengan luas 1100 ha.
                </p>
                <br>
                <h6>5. Observasi dan Transek Sungai Pusur</h6>
                <p>
                  Kegiatan yang dilakukan berupa observasi potensi dan peluang Sungai Pusur, dengan melibatkan variable sungat antara lain
                  sampah, potensi bencana, vegetasi/biota, dan sosial.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Sumber Daya</h4>
            <p>
              Pusur Institute merupakan kelembagaan yang mewadahi para pemerhati kelestarian sub DAS Pusur dimana sumberdaya 
              yang dikontribusikan bersifat kesukarelawanan (voluntary)
            </p>
            <div class="text-button">
              <a data-bs-toggle="modal" data-bs-target="#showkerjasama">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="showkerjasama" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sumber Daya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <ul>
                  <li>1. Pemerintah Kecamatan POLANHARJO memberikan dukungan kantor kesekretariatan Pusur Institute</li>
                  <li>2. Pemerintah desa terkait memberikan dukungan penataan ruang dan support terhadap komunitas melalui pembiayaan desa dan fasilitas desa</li>
                  <li>3. Lembaga Swadaya Masyarakat, memfasilitasi program-program tematik di sepanjang rivarian sub-DAS Pusur dan juga mengembangkan upaya-upaya kemitraan dengan pemerintah terkait baik pemerintah kabupaten Klaten, Boyolali, Provinsi Jawa Tengah dan pemerintah pusat</li>
                  <li>4. PT. Tirta Investama (DANONE Group) mendukung berbagai skema kegiatan terkait pengelolaan Kawasan sub-DAS Pusur melalui skema pendanaan tanggung jawab social dan lingkungan perusahaan (CSR)</li>
                  <li>5. Komunitas peduli sungai telah berproses menuju kemandirian keuangan sehingga upaya-upaya pelestarian sungai Pusur melalui kegiatan fisik seperti bersih sungai, penghijauan, penataan areal dilakukan melalui kas masing-masing komunitas sungai</li>
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="contact" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Contact Us</h4>
            <img src="{{asset('layout')}}/assets/images/heading-line-dec.png" alt="">
            <main id="main">

    <!-- ======= Contact Section ======= -->
    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
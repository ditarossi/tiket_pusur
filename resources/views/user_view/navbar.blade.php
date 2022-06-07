<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
        
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="{{asset('layout')}}/assets/images/logo.png" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <!--<li class="scroll-to-section"><a href="#services">History</a></li>-->
              <li class="scroll-to-section"><a href="#services">Visi</a></li>
              <!--<li class="scroll-to-section"><a href="#pricing">Struktur Organisasi</a></li>-->
              <li class="scroll-to-section"><a href="#pricing">Wisata</a></li>
              <li class="scroll-to-section"><a href="#order">Pemesanan</a></li>
              <li class="nav-item dropdown">
              
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">
                                        {{ __('Update Profile') }}
                                    </a> -->
                                    <a class="dropdown-item" href="{{ url('tiket') }}">
                                        {{ __('Lihat Tiket') }}
                                    </a>
                                    <!-- <a class="dropdown-item" href="#modal" data-bs-toggle="modal" data-bs-target="\">
                                        {{ __('Riwayat Transaksi') }}
                                    </a> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
              </li>
          </ul>   
               
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>

        </div>
        
      </div>
    </div>
  </header>
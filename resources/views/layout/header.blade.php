
<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site                 = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_prof  = $myprofil->nav_prof();



?>
 <!-- ======= Header ======= -->
 <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/upload/image/'.$site->logo) }}"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar" >
        <ul>
          <li><a class="nav-link scrollto" id="#" href="{{ url('/') }}">BERANDA</a></li>
          <li class="dropdown"><a href="#"><span>PROFIL</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach($nav_prof as $nav_prof) { ?>
                <li><a href="{{ asset('profil/kategori/'.$nav_prof->slug_kategori_profil) }}">{{ Str::words($nav_prof->nama_kategori_profil,6) }}</a></li>
                <?php } ?>
                
                <li><a href="{{ url('tenaga-pengajar') }}">Tenaga Pengajar</a></li>

            </ul>

          </li>
          <li class="dropdown"><a href="#"><span>AKADEMIK</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('kurikulum')}}">Kurikulum</a></li>
              <li><a href="{{ url('berkas')}}">Berkas</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>MEDIA</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('pengumuman') }}">Pengumuman</a></li>
              <li><a href="{{ url('berita') }}">Berita</a></li>
             
            </ul>
          </li>
          <li><a class="nav-link scrollto " href="https://pmb.universitasbumigora.ac.id/v.2019/daftar">DAFTAR</a></li>
          
        </ul>
       
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var currentLocation = window.location.href;
      var navLinks = document.querySelectorAll("nav a");
  
      navLinks.forEach(function (link) {
        if (link.href === currentLocation) {
          link.classList.add("active");
        }
      });
    });
  </script>
  

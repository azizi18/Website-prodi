<!DOCTYPE html>
<?php 
$site_config = DB::table('konfigurasi')->first();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $site_config->namaweb }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/upload/image/'.$site_config->icon) }}" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dataTables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/aws/css/prettyPhoto.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/aws/css/style.css') }}" rel="stylesheet">
<style>
     :root {
            --theme-color: {{ $site_config->website_color }};

        }
#header {
  background:var(--theme-color) ;
  transition: all 0.5s;
  z-index: 997;
  height: 86px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

#header.fixed-top {
  height: 90px;
}

#header .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 600;
  letter-spacing: 0.8px;
  font-family: 'PT Serif', serif;
}

#header .logo a {
  color: #fff;
}


#header .logo img {
  max-height: 60px;
}

.scrolled-offset {
  margin-top: 70px;
}
/* Stil header kecil saat scroll */
#header.small {
  padding: 10px;
}


/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar>ul>li {
  white-space: nowrap;
  padding: 10px 0 10px 28px;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 3px;
  font-size: 17px;
  font-weight: 600;
  color: #fff;
  white-space: nowrap;
  transition: 0.3s;
  position: relative;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}


.navbar a:hover:before,
.navbar li:hover>a:before,
.navbar .active:before {
  visibility: visible;
  width: 100%;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: black;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  font-family: 'Ubuntu', sans-serif;
  left: 0;
  top: calc(100% + 30px);
  margin: 0;
  margin-top: 30px;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background:var(--theme-color) ;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
 
}
.navbar .dropdown ul::before  {
  content: '';
  position: absolute;
  top: 0;
  left: 80%;
  margin-top: -8px;
  transform: translateX(-30%);
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 8px solid var(--theme-color) ; /* Warna background dropdown content */
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 100;
 
}

.navbar .dropdown ul a i {
  font-size: 12px;

}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: black;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}
@media (max-width: 1366px) {
 
  .navbar .dropdown:hover>ul {
    left: -50%;
  }
}


/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #fff;
  font-size: 30px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

.mobile-nav-toggle.bi-x {
  color: #fff;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  top: 30px;
  right: 0;
  left: 0;
  bottom: 0;
  transition: 0.3s;
  z-index: 999;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  width: 100%;
  top: 55px;
  padding: 15px 0;
  background-color: var(--theme-color) ;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile a,
.navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 18px;
  color: #fff;
}

.navbar-mobile>ul>li {
  padding: 0;
}

.navbar-mobile a:hover:before,
.navbar-mobile li:hover>a:before,
.navbar-mobile .active:before {
  visibility: hidden;
}

.navbar-mobile a:hover,
.navbar-mobile .active,
.navbar-mobile li:hover>a {
  color: black;
}

.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: var(--theme-color) ;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: black;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}

.search-icon {
  cursor: pointer;
}



.btn-faq {
  background-color: white;
  margin: 5px 0 auto;
  margin-top: 20px; 
  display: inline-block;
  border: 2px solid var(--theme-color);
  height: 45px;
  font-size: 12px;
  padding: 13px 18px;
  vertical-align: top;
  font-family: Arial, Helvetica, sans-serif;

}
.btn-faq:hover {
  background-color: var(--theme-color);
  transition: 0.30s;
}
.btn-faq:hover a {
  color: white;
}
.btn-faq:hover i{
  color: white;
}

 .btn-faq i {
  color: var(--theme-color);
  text-align: center;
  margin-top: 1px;
  margin-left: 4px;
  
  
}
.btn-faq a {
  color: var(--theme-color);
  text-align: center;
  margin-top: 1px;
  
}

.btn-berkas {
  margin-bottom: 20px;
}
.btn-download {
  margin-top: -90px;
  background-color: var(--theme-color);
  margin: 5px 0 auto;
  display: inline-block;
  border: 2px solid var(--theme-color);
  height: 30px;
  font-size: 12px;
  padding: 5px 18px;
  vertical-align: top;
  font-family: Arial, Helvetica, sans-serif;

}
.btn-download:hover {
  background-color: #fff;
  transition: 0.30s;
}
.btn-download:hover a {
  color: var(--theme-color);
}


.btn-download  a {
  color: #fff;
  text-align: center;
  margin-top: 1px;
  
}


@media (max-width: 600px) {
  .search-icon {
    display: none; /* Menghilangkan ikon pencarian pada layar responsif */
  }

  .search-input {
    width: 100%;
    display: block;
  }
}

.search-input {
  width: calc(100% - 20px); /* Lebar input mengikuti lebar container dengan padding 10px */
  padding: 11px;
  border: none; /* Menghilangkan border */
  outline: none;
  background: var(--theme-color);
}
#footer .footer-top {
  padding: 60px 0 30px 0;
  /* background: #2196f3; */
  background:  var(--theme-color);
}
    </style>

</head>


<body>


    @section('header')
        @include('layout.header')
    @show

    @yield('content')

    @section('footer')
        @include('layout.footer')
    @show
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/dataTables/datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/dataTables/datatables.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('js/share.js') }}"></script>


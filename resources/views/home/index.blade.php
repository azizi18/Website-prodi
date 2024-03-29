<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config                 = DB::table('konfigurasi')->first();


?>
@extends('layout.head')
@section('content')
 <!-- ======= banner Section ======= -->
 <section id="hero">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <?php foreach($slider as $index => $slider) { ?>
          <div class="carousel-item {{$index == '0' ? 'active':''}}">
            <img src="{{ asset('assets/upload/image/'.$slider->gambar) }}" class="" alt="">     
    
            <div class="carousel-caption">
                <?php if($slider->status_text=="Ya") { ?>
                    <h1 data-aos="fade-up" data-aos-delay="100" >{{ $slider->judul_galeri }}</h1>
                   
                    <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
  </section><!-- End Banner -->

  <main id="main">
        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
          <div class="container" data-aos="fade-up">
            <div class="">
              <h1 class="tittle mt-4">Program Studi <?php echo $site_config ->namaweb; ?></h1>
              <p class="garbar-periode"></p>
              <div class="d-flex">
              <p class="desc text-justify mt-4"><?php echo $site_config ->tentang; ?></p>
            </div>
            </div>
              <div class="container text-center">
                  <div class="periode">
                      <div class="row">
                          <div class="col-md-6">
                            <p class="garbar-feature"></p>
                              <p class="title-periode">Gelombang Pendaftaran</p>
                              <p class="description"><?php echo $site_config ->periode_satu; ?></p>
                              <p class="description"><?php echo $site_config ->periode_dua; ?></p>
                              <p class="description"><?php echo $site_config ->periode_tiga; ?></p>

                               <p class="title-jadwal mt-4">Kalender Akademik</p>
                              <p class="btn-kalender"><a href="https://universitasbumigora.ac.id/kalender/kategori/kalender-akademik-ta-20232024">Kalender Akademik 2023/2024</a></p>
                                     
                              <p class="garbar-feature mt-5"></p>


                          </div>
                          <div class="col-md-6">
                            <p class="garbar-feature"></p>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/_5ccf9ldxwQ?si=Z8PfA68bq2TthqIA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                             

                          </div>
                          
                      </div>
                  </div>
              </div>

          </div>
      </section><!-- End Featured Services Section -->


   <!-- ======= Berita Section ======= -->
   <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-between">
        <div class="col-md-6">
          <div class="d-flex">
          <img src="assets/img/icons/pengumuman.svg" alt="pengumuman" class="icon-pengumuman"><span><h1 class="fw-bold">Pengumuman</h1></span></div>
          <p class="garbar-tittle mt-2"></p> 
          <?php foreach($pengumuman->take(3) as $pengumuman) { ?>
            <ul class="berita-list">
  
              <li>
                  <a href="{{ asset('pengumuman/read/' . $pengumuman->slug_pengumuman) }}">
                    <h4 class="fw-bold"><?php echo $pengumuman->judul_pengumuman; ?></h4>
                </a>
                <p class=""> <?php echo date('M d Y ', strtotime($pengumuman->tanggal_publish)); ?></p>
              </li>
  
            
              
            </ul>
          <?php } ?>
          <div class="btn-lihat">
            <p class="btn-faq"><a href="{{ url('pengumuman') }}"> <span>Lihat semua</span><i class="bi bi-arrow-right"></i></a></p>
          </div>
        
        </div>
          <div class="col-md-6 ">
            <div class="d-flex">
            <img src="assets/img/icons/berita.svg" alt="berita" class="icon-berita"><span><h1 class="fw-bold">Berita Utama</h1></span></div>
            <p class="garbar-tittle"></p> 
            <?php foreach($berita->take(3) as $berita) { ?>
            <ul class="berita-list">
  
              <li>
                  <a href="{{ asset('berita/read/' . $berita->slug_berita) }}">
                    <h4 class="fw-bold"><?php echo $berita->judul_berita; ?></h4>
                </a>
                <p class=""> <?php echo date('M d Y ', strtotime($berita->tanggal_publish)); ?></p>
              </li>
  
            
              
            </ul>
            <?php } ?>
            <div class="btn-lihat">
              <p class="btn-faq"><a href="{{ url('berita') }}"><span>Lihat semua</span><i class="bi bi-arrow-right"></i></a></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section> <!-- End Berita Section -->

    <!-- ======= Let's Watch ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
            <iframe class="frame-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.046584392539!2d116.1138633736998!3d-8.591519787220504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c2462a5ed%3A0xbc0f44d683d529b1!2sUniversitas%20Bumigora!5e0!3m2!1sid!2sid!4v1698462619346!5m2!1sid!2sid"  style="border:0; width: 100%; height: 345px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
      </div>
    </section><!-- End Let's Watch Section -->
    
  </main><!-- End #main -->
@endsection

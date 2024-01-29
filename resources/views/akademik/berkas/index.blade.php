@extends('layout.head')
@section('content')
    <section id="berkas" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="tittle text-center mt-5">BERKAS</h1>
           <div class="row mt-5">
               <?php $i=1; foreach($download as $download) { ?>
          <div class="isi">
                <p><?php echo $download->urutan ?>.<?php echo $download->nama_download ?></p>
                <div class="btn-berkas -mt-4">
                    <p class="btn-download"><a href="{{ asset('berkas/unduh/'.$download->id_download) }}"> <span><?php echo $download->judul_download ?></span></a></p>
                  </div>
                </div>
                <?php $i++; } ?>
        </div>
    </div>
    </section><!-- End Banner -->
@endsection

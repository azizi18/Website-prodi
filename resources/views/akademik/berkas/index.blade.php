@extends('layout.head')
@section('content')
    <section id="berkas" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="tittle text-center mt-5">BERKAS</h1>
           <div class="row mt-5">
               <?php $i=1; foreach($berkas as $berkas) { ?>
          <div class="isi-berkas">
                <p><?php echo $berkas->judul_link ?></p>
                <p><?php echo $berkas->isi ?></p>
              
                </div>
                <?php $i++; } ?>
        </div>
    </div>
    </section><!-- End Banner -->
@endsection

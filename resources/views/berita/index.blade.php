@extends('layout.head')
@section('content')
    <section id="berita" class="d-flex align-items-center ">
        <div class="container">
            <h1 class="tittle mt-5">Berita</h1>
            
            <div class="row card-berita" data-aos="zom-out" data-aos-delay="100">
            <?php foreach($berita as $berita) { ?>
                <?php if($berita->status_berita=="Publish") { ?>
                    <div class="col-md-4">
            <div class="card" style="width: 22rem;">
           
              <img id="thumbnail" src="{{ asset('assets/img/thumbnail.png') }}"  alt="">

            
                <div class="card-body">
                  <h5 class="card-title fw-bold"><?php echo $berita->judul_berita; ?></h5>
                  <p class="card-text"><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, $end = ''); ?></p>
                  <a href="{{ asset('berita/read/' . $berita->slug_berita) }}" class="btn btn-danger">Read More</a>
                </div>
              </div>
            </div>
              <?php } ?>
              <?php } ?>
            
            
            </div>
            <div class="gt-pagination">
                {{ $ber->links() }}
            </div>
        </div>
        


    </section>
@endsection


@extends('layout.head')
@section('content')
    <section id="pengumuman" class="">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
            <h1 class="tittle mt-5 text-center">Pengumuman</h1>
            
                <div class="row card-berita" data-aos="zom-out" data-aos-delay="100">
                    <?php foreach($pengumuman as $pengumuman) { ?>
                        <?php if($pengumuman->status_pengumuman=="Publish") { ?>
                 
                        <div class="col-md-4 mt-4">
                        <div class="card" style="width: 23rem;">
                     
                         <img id="thumbnail" src="{{ asset('assets/img/thumbnail.png') }}"  alt="">
                                            
                    <div class="card-body">
                          <h5 class="card-title fw-bold"><?php echo $pengumuman->judul_pengumuman; ?></h5>
                          <p class="card-text"><?php echo \Illuminate\Support\Str::limit(strip_tags($pengumuman->isi), 100, $end = ''); ?></p>
                          <a href="{{ asset('pengumuman/read/' . $pengumuman->slug_pengumuman) }}" class="btn btn-danger">Read More</a>
                        </div>
                      </div>
                      </div>

                   
                      <?php } ?>
                      <?php } ?>
                    
                    
                    </div>
              
              
               
            </div>
            </div>
          
            <div class="gt-pagination">
            {{ $peng->links() }}
        </div>

        </div>
      
        
    </section>

@endsection

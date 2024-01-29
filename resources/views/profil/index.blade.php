@extends('layout.head')
@section('content')
    <section id="profil" class="profil-home">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="tittle mt-5">{{ $title }}</h1>
            <p class="garbar-tittle"></p>
            <div class="row justify-content-center align-item-center" data-aos="fade-up" data-aos-delay="100">
                
                    <?php  foreach($profil as $profil) { ?>
                     <div class="isi">
                        <?php echo $profil->isi ?>
                    </div> 
                    <?php } ?>
                    </div>
               
               
            </div>
    </section>
@endsection

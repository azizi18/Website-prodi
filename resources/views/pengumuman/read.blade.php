@extends('layout.head')
@section('content')
    <section id="pengumuman" class="isi-mahasiswa">
        <div class="container">
         
            <p class="mt-5"> <?php echo $read->nama; ?>| <?php echo date('M d Y ', strtotime($read->tanggal_publish)); ?>
                | <?php echo $read->jenis_pengumuman; ?></p>
            <div class="pengumuman" href="#faq1">

                    <h3 class="fw-bold"><i class="bi bi-file-earmark-text-fill icon-camera"> </i><?php echo $read->judul_pengumuman; ?> </h4>
               
            </div>
      <div class="isi-berkas">
            <h6><?php echo $read->isi; ?></h6>
        </div>
        <div class="row mt-4" data-aos="fade-up" data-aos-delay="100">
                <div class="share d-flex justify-content-end gap-4">
                
                <div class="like-heart">
                <i id="loveIcon" class="bi bi-heart-fill love-icon" onclick="toggleLike()"></i><span id="likeCount" class="mx-2">0</span>

            </div>
            </div>
                <div class="garbar"></div>
        </div>
        <div class="related-post mt-4" style="font-size: 24px">
            Related Posts
        </div> 
        <div class="row" data-aos="fade-up" data-aos-delay="50">
            
        <?php foreach($related_post as $related_post) { ?>
            <?php if($related_post->status_pengumuman=="Publish") { ?>

        <div class="col-lg-4 mt-4">
            <div class="pengumuman" href="#faq1">
                <a href="{{ asset('pengumuman/read/' . $related_post->slug_pengumuman) }}">
                    <div class="fw-bold"><?php echo $related_post->judul_pengumuman; ?>
                    </div>
                </a>
            </div>
            <p> <?php echo date('M d Y ', strtotime($related_post->tanggal_publish)); ?>  
            </p>
            <div class="read-more mt-2" href="#faq1" style="font-size: 18px">
                <a href="{{ asset('pengumuman/read/' . $related_post->slug_pengumuman) }}">
                    <p class="fw-bold">Read More<i class="bi bi-chevron-right">
                        </i></p>
                </a>
              
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        </div>
        <div class="garbar"></div>
        <div>
            <h4 class="comment">Leave a Comment!</h4>
            <p>Your email address will not be published. Required fields are marked *</p>
            <div class="row">
                <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Name*" value="">
                </div>
                <div class="col-md-4">
                <input type="email" name="name" class="form-control" placeholder="Email*" value="">
                </div>
                <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="website" value="">
                </div>
                <div class="col-md-12 mt-4">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Comment"></textarea>
                </div>

                <div class=" mt-4">
                    <input type="submit" name="submit" class="" value="Post Comment">
                </div>
        </div>
          
          
        </div>
        <script>
            // Fungsi untuk membuat PDF dari elemen HTML
            function generatePDF() {
                const content = document.getElementById('content');
                const pdf = new jsPDF();
        
                // Tambahkan konten ke PDF
                pdf.fromHTML(content, 15, 15);
        
                // Simpan atau tampilkan PDF
                // pdf.save('print-view.pdf');
                pdf.output('dataurlnewwindow');
            }
        </script>
        
    </section>
@endsection




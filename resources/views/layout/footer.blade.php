<?php 
use Illuminate\Support\Facades\DB;

$site_config = DB::table('konfigurasi')->first();

?>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-8 footer-contact">
            <h3>Universitas Bumigora</h3>
            <p>
              <strong>Alamat :</strong><br>
              <?php echo nl2br($site_config->alamat) ?>
              <br>
                  <br>
                <strong>Jam pelayanan Akademik :</strong> <br>
                  {{ $site_config->jam_pelayanan }}<br> <br>
              <strong>Telephone :</strong> <br>
              {{ $site_config->telepon }}<br> <br>
              <strong>Email :</strong> <br>
               {{ $site_config->email }}<br>
          </p>
          </div>

          <div class="col-lg-4 col-md-8 footer-links">
            <h4>JELAJAHI</h4>
            <ul>
              <li><a href="{{ url('pengumuman') }}">Pengumuman</a></li>
              <li><a href="{{ url('berita') }}">Berita</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-8 footer-links">
            <h4>PUBLIKASI</h4>
            <ul>
              <li><a href="#">E-Jurnal</a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>

  
  </footer><!-- End Footer -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="alert alert-info">
    <p>Hai <strong>{{ Session()->get('nama') }}</strong>, Selamat datang di Halaman Dashboard Administrator</p>

</div>
<hr>

<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> Berita</span>
                <span class="info-box-number">
                    <?php
                    $berita = DB::table('berita')
                        ->where('jenis_berita', 'Berita')
                        ->get();
                    echo $berita->count();
                    ?>
                    <small>Berita</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    {{-- <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">
                    Struktur
                </span>
                <span class="info-box-number">
                    <?php
                    $berita = DB::table('berita')
                        ->where('jenis_berita', 'Layanan')
                        ->get();
                    echo $berita->count();
                    ?>
                    <small></small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div> --}}
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="bi bi-newspaper"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Skripsi</span>
                <span class="info-box-number">
                    <?php
                    $skripsi = DB::table('skripsi')->get();
                    echo $skripsi->count();
                    ?>
                    <small>Skripsi</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="bi bi-person-vcard-fill"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Dosen Pengajar</span>
                <span class="info-box-number">
                    <?php
                    $dosen = DB::table('nama_pengajar')->get();
                    echo $dosen->count();
                    ?>
                    <small>Dosen Pengajar</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- fix for small devices only -->
   
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-image"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Galeri Slider</span>
                <span class="info-box-number">
                    <?php
                    $galeri = DB::table('galeri')->get();
                    echo $galeri->count();
                    ?>
                    <small>Post</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Info boxes -->
<div class="row">

    <!-- /.col -->
    {{-- <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">
                    Dosen dan Staff
                </span>
                <span class="info-box-number">
                    <?php
                    $staff = DB::table('staff')->get();
                    echo $staff->count();
                    ?>
                    <small>Orang</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div> --}}
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

   
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengumuman</span>
                <span class="info-box-number">
                    <?php
                    $agenda = DB::table('pengumuman')->get();
                    echo $agenda->count();
                    ?>
                    <small>Pengumuman</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
   
    <!-- /.col -->
</div>
<!-- /.row -->

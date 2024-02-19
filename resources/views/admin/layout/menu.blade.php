<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ asset('admin/dasbor') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Management Content</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-galeri" data-bs-toggle="collapse" href="#">
          <i class="fas fa-image"></i><span>Galeri Slider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-galeri" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/galeri') }}">
              <i class="bi bi-circle"></i><span>Data Galeri</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/galeri/tambah') }}">
              <i class="bi bi-circle"></i><span>Tambah Galeri</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Berita</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/berita') }}">
              <i class="bi bi-circle"></i><span>Data Berita</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/berita/tambah') }}">
              <i class="bi bi-circle"></i><span>Tambah Berita</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/kategori') }}">
              <i class="bi bi-circle"></i><span>Kategori Berita</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pengumuman-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Pengumuman</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pengumuman-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/pengumuman') }}">
              <i class="bi bi-circle"></i><span>Data Pengumuman</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/pengumuman/tambah') }}">
              <i class="bi bi-circle"></i><span>Tambah Pengumuman</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/kategori-pengumuman') }}">
              <i class="bi bi-circle"></i><span>Kategori Pengumuman</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Profil Prodi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/profil') }}">
              <i class="bi bi-circle"></i><span>Data Profil</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/profil/tambah') }}">
              <i class="bi bi-circle"></i><span>Tambah Profil</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/kategori_profil') }}">
              <i class="bi bi-circle"></i><span>Kategori Profil</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-staff" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-vcard-fill"></i><span>Tenaga Pengajar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-staff" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/dosen-staff') }}">
              <i class="bi bi-circle"></i><span>Tenaga Pengajar</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/dosen-staff/tambah') }}">
              <i class="bi bi-circle"></i><span>Tambah Tenaga Pengajar</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-berkas" data-bs-toggle="collapse" href="#">
          <i class="fas fa-download"></i><span>Berkas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-berkas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/download') }}">
              <i class="bi bi-circle"></i><span>Data Berkas</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/download/tambah') }}">

              <i class="bi bi-circle"></i><span>Tambah Berkas</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-heading">Data</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-kurikulum" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Kurikulum</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-kurikulum" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/semester-satu') }}">
              <i class="bi bi-circle"></i><span>Data Semester 1</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-dua') }}">

              <i class="bi bi-circle"></i><span>Data Semester 2</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-tiga') }}">

              <i class="bi bi-circle"></i><span>Data Semester 3</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-empat') }}">

              <i class="bi bi-circle"></i><span>Data Semester 4</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-lima') }}">

              <i class="bi bi-circle"></i><span>Data Semester 5</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-enam') }}">

              <i class="bi bi-circle"></i><span>Data Semester 6</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-tujuh') }}">

              <i class="bi bi-circle"></i><span>Data Semester 7</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/semester-delapan') }}">

              <i class="bi bi-circle"></i><span>Data Semester 8</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Website Setting</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ asset('admin/user') }}">
          <i class="bi bi-person"></i>
          <span>Pengguna Website</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-konfigurasi" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Konfigurasi Website</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-konfigurasi" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('admin/konfigurasi') }}">
              <i class="bi bi-circle"></i><span>Konfigurasi Umum</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/konfigurasi/icon') }}">
              <i class="bi bi-circle"></i><span>Ganti Icon</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('admin/konfigurasi/logo') }}">
              <i class="bi bi-circle"></i><span>Ganti Logo</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->



  <main id="main" class="main">



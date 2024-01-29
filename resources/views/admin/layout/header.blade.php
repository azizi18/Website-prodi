
  
  <?php
  use Illuminate\Support\Facades\DB;
  use App\Models\Nav_model;
  $site = DB::table('konfigurasi')->first();
  ?>
 
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ asset('admin/dasbor') }}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">{{$site->namaweb}}</span>
      </a>
    
      <i class="bi bi-list toggle-sidebar-btn"></i>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ asset('/') }}" target="_blank" class="nav-link"><i class="fa fa-home"></i>
            Beranda</a>
    </li>
    </div><!-- End Logo -->

  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

    

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo Session()->get('nama'); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo Session()->get('nama'); ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ asset('login/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  
  <script>
    if (select('.toggle-sidebar-btn')) {
  on('click', '.toggle-sidebar-btn', function(e) {
    select('body').classList.toggle('toggle-sidebar')
  })
}

</script>
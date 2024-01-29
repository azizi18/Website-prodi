<div class="pagetitle">
    <h1>Skripsi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
        <li class="breadcrumb-item active">Skripsi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/skripsi/cari') }}" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..."
                    value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    
                    <a href="{{ asset('admin/skripsi/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                   
                </span>
            </div>
        </form>
    </div>
  
</div>

<div class="clearfix">
    <hr>
</div>
<div class="col-md-6 text-left">
    {{ $skripsi->links() }}
</div>
<form action="{{ asset('admin/skripsi/proses') }}" method="post" accept-charset="utf-8">
    <input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
    <?php $site = DB::table('konfigurasi')->first(); ?>
    {{ csrf_field() }}

    <div class="table-responsive mailbox-messages">
        <table class="display table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-dark">
                    <th width="5%">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                        </div>
                    </th>
                    <th width="15%">GAMBAR</th>
                    <th width="25%">JUDUL</th>
                    <?php if(Request::segment(3)=="jenis_skripsi") { ?>
                    <?php }else{ ?>
                    <th width="15%">KATEGORI</th>
                    <?php } ?>

                    <th width="10%">AUTHOR</th>
                    <th width="10%">STATUS</th>
                    <th width="15%">ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($skripsi as $skripsi) { ?>

                <tr>
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_skripsi[]" value="{{ $skripsi->id_skripsi }}"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                    <td>
                        <?php echo $skripsi->file ?> 
                    </td>
                    <td>
                        <a href="{{ asset('admin/skripsi/edit/' . $skripsi->id_skripsi) }}">
                            <?php echo $skripsi->judul_skripsi; ?> <sup><i class="fa fa-pencil"></i></sup>
                        </a>
                        <small>
                            <br>Posted: <?php echo date('d M Y H:i: s', strtotime($skripsi->tanggal_post)); ?>
                            <br>Published: <?php echo date('M d Y', strtotime($skripsi->tanggal_publish)); ?>
                            <?php if($skripsi->jenis_skripsi=="Promo") { ?>
                            <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y', strtotime($skripsi->tanggal_mulai)); ?> s/d
                                    <?php echo date('d M Y ', strtotime($skripsi->tanggal_selesai)); ?></strong></span>
                            <?php } ?>
                            <br>Urutan: <?php echo $skripsi->urutan; ?>
                            <br>Tgl posting: <?php echo date('M d Y ', strtotime($skripsi->tanggal_publish)); ?>
                            <br>Jenis: <a href="{{ asset('admin/skripsi/jenis_skripsi/' . $skripsi->jenis_skripsi) }}">
                                <?php echo $skripsi->jenis_skripsi; ?><sup><i class="fa fa-link"></i></sup>
                            </a>
                        </small>
                    </td>

                    <?php if(Request::segment(3)=="jenis_skripsi") {}else{ ?>
                    <td>
                        <a href="{{ asset('admin/skripsi/kategori/' . $skripsi->id_kategori) }}">
                            <?php echo $skripsi->nama_kategori; ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                    </td>
                    <?php } ?>

                    <td><?php if(Request::segment(3)=="jenis_skripsi") {echo $skripsi->nama; }else{ ?>
                        <a href="{{ asset('admin/skripsi/author/' . $skripsi->id_user) }}">
                            <?php echo $skripsi->nama; ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                        <?php } ?>
                    </td>
                    <td><a href="{{ asset('admin/skripsi/status_skripsi/'.$skripsi->status_skripsi) }}">
                        <small class="badge <?php if($skripsi->status_skripsi=="Publish") { echo 'badge-success'; }else{ echo 'badge-warning'; } ?> btn-block">
                          <i class="fa <?php if($skripsi->status_skripsi=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $skripsi->status_skripsi ?></small>
                      </a></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('skripsi') }}" class="btn btn-success btn-sm"
                                target="_blank"><i class="fa fa-eye"></i></a>

                            <a href="{{ asset('admin/skripsi/edit/' . $skripsi->id_skripsi) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/skripsi/delete/' . $skripsi->id_skripsi) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>

        </table>
        
    </div>
   
</form>


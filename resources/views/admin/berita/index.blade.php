<div class="pagetitle">
    <h1>Berita</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
        <li class="breadcrumb-item active">Berita</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/berita/cari') }}" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..."
                    value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <?php if(Request::segment(3)=="jenis_berita") { ?>
                    <a href="{{ asset('admin/berita/tambah?jenis_berita=' . Request::segment(4)) }}"
                        class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                    <?php }else{ ?>
                    <a href="{{ asset('admin/berita/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                    <?php } ?>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-6 text-left">
        {{ $berita->links() }}
    </div>
</div>

<div class="clearfix">
    <hr>
</div>

<form action="{{ asset('admin/berita/proses') }}" method="post" accept-charset="utf-8">
    <input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
    <?php $site = DB::table('konfigurasi')->first(); ?>
    {{ csrf_field() }}

    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
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
                    <th width="15%">ISI</th>
                    <th width="25%">JUDUL</th>
                    <?php if(Request::segment(3)=="jenis_berita") { ?>
                    <?php }else{ ?>
                    <th width="15%">KATEGORI</th>
                    <?php } ?>

                    <th width="10%">AUTHOR</th>
                    <th width="10%">STATUS</th>
                    <th width="15%">ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($berita as $berita) { ?>

                <tr>
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_berita[]" value="{{ $berita->id_berita }}"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>
                    <td><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 200, $end = '...');
                        ?>
                      </td>
                    <td>
                        <a href="{{ asset('admin/berita/edit/' . $berita->id_berita) }}">
                            <?php echo $berita->judul_berita; ?> <sup><i class="fa fa-pencil"></i></sup>
                        </a>
                        <small>
                            <br>Posted: <?php echo date('d M Y H:i: s', strtotime($berita->tanggal_post)); ?>
                            <br>Published: <?php echo date('M d Y', strtotime($berita->tanggal_publish)); ?>
                            <?php if($berita->jenis_berita=="Promo") { ?>
                            <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y', strtotime($berita->tanggal_mulai)); ?> s/d
                                    <?php echo date('d M Y ', strtotime($berita->tanggal_selesai)); ?></strong></span>
                            <?php } ?>
                            <br>Urutan: <?php echo $berita->urutan; ?>
                            <br>Tgl posting: <?php echo date('M d Y ', strtotime($berita->tanggal_publish)); ?>
                            <br>Jenis: <a href="{{ asset('admin/berita/jenis_berita/' . $berita->jenis_berita) }}">
                                <?php echo $berita->jenis_berita; ?><sup><i class="fa fa-link"></i></sup>
                            </a>
                        </small>
                    </td>

                    <?php if(Request::segment(3)=="jenis_berita") {}else{ ?>
                    <td>
                        <a href="{{ asset('admin/berita/kategori/' . $berita->id_kategori) }}">
                            <?php echo $berita->nama_kategori; ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                    </td>
                    <?php } ?>

                    <td><?php if(Request::segment(3)=="jenis_berita") {echo $berita->nama; }else{ ?>
                        <a href="{{ asset('admin/berita/author/' . $berita->id_user) }}">
                            <?php echo $berita->nama; ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                        <?php } ?>
                    </td>
                    <td><a href="{{ asset('admin/berita/status_berita/'.$berita->status_berita) }}">
                        <small class="badge <?php if($berita->status_berita=="Publish") { echo 'badge-success'; }else{ echo 'badge-warning'; } ?> btn-block">
                          <i class="fa <?php if($berita->status_berita=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $berita->status_berita ?></small>
                      </a></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('berita') }}" class="btn btn-success btn-sm"
                                target="_blank"><i class="fa fa-eye"></i></a>

                            <a href="{{ asset('admin/berita/edit/' . $berita->id_berita) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/berita/delete/' . $berita->id_berita) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>
        </table>
    </div>
</form>

<div class="pagetitle">
    <h1>Galeri</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
        <li class="breadcrumb-item active">Galeri</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/galeri/cari') }}" method="get" accept-charset="utf-8">
            <br>
            <div class="input-group">
                <input type="text" name="keywords" class="form-control"
                    placeholder="Ketik kata kunci pencarian galeri...." value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ asset('admin/galeri/tambah') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Tambah Baru</a>
                </span>
            </div>
        </form>
    </div>
    <div class="col-md-6 text-left">

    </div>
</div>

<div class="clearfix">
    <hr>
</div>
<form action="{{ asset('admin/galeri/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
   
    <div class="clearfix">
        <hr>
    </div>
    <div class="table-responsive mailbox-messages">
        <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr class="bg-info">
                    <th width="5%" class="text-center">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                        </div>
                    </th>
                    <th width="8%">GAMBAR</th>
                    <th width="20%">JUDUL</th>
                    <th width="10%">TAMPILKAN TEKS DI BANNER?</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($galeri as $galeri) { ?>

                <tr class="odd gradeX">
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_galeri[]" value="<?php echo $galeri->id_galeri; ?>"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>

                    <td><img src="{{ asset('assets/upload/image/thumbs/' . $galeri->gambar) }}"
                            class="img img-thumbnail img-fluid"></td>
                    <td><?php echo $galeri->judul_galeri; ?></td>
                   
                 
                    <td>{{ $galeri->status_text }}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{ asset('admin/galeri/edit/' . $galeri->id_galeri) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="{{ asset('admin/galeri/delete/' . $galeri->id_galeri) }}"
                                class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                        </div>

                    </td>
                </tr>

                <?php $i++; } ?>

            </tbody>
        </table>
    </div>

</form>

<div class="clearfix">
    <hr>
</div>
<div class="pull-right"><?php if (isset($pagin)) {
    echo $pagin;
} ?></div>

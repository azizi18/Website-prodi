<div class="row">

    <div class="col-md-6">
        <form action="{{ asset('admin/dosen-staff/cari') }}" method="get" accept-charset="utf-8">
            <br>
            <div class="input-group">
                <input type="text" name="keywords" class="form-control"
                    placeholder="Ketik kata kunci pencarian staff...." value="<?php if (isset($_GET['keywords'])) {
                        echo strip_tags($_GET['keywords']);
                    } ?>" required>
                <span class="input-group-btn btn-flat">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    <a href="{{ asset('admin/dosen-staff/tambah') }}" class="btn btn-success">
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
<form action="{{ asset('admin/dosen-staff/proses') }}" method="post" accept-charset="utf-8">
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
                    <th width="10%">GAMBAR</th>
                    <th width="30%">NAMA</th>
                    <th width="7%">TAMPIL</th>
                    <th width="7%">NO URUT</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i=1; foreach($staff as $staff) { ?>

                <tr class="odd gradeX">
                    <td class="text-center">
                        <div class="icheck-primary">
                            <input type="checkbox" name="id_staff[]" value="<?php echo $staff->id_staff; ?>"
                                id="check<?php echo $i; ?>">
                            <label for="check<?php echo $i; ?>"></label>
                        </div>
                    </td>


                    <td> @if ($staff->gambar)
                        <img src="{{ asset('assets/upload/staff/thumbs/' . $staff->gambar) }}"
                            class="img  img-fluid">                             
                        @else
                        <img id="thumbnail" src="{{ asset('assets/img/thumbnail-user.png') }}"  alt="photo-dosen"class="img  img-fluid">
          
                        @endif
                        </td>
                    <td><?php echo $staff->nama_staff; ?>
                        <small>
                            <br>NIK/NIP :<?php echo $staff->nik; ?>

                        </small>
                    </td>
                   
                    <td><a href="{{ asset('admin/dosen-staff/status_staff/' . $staff->status_staff) }}">
                            <?php echo $staff->status_staff; ?></a></td>
                    <td><?php echo $staff->urutan; ?></td>
                    <td>
                        <div class="btn-group">
                            {{-- <a href="{{ asset('admin/staff/detail/' . $staff->id_staff) }}"
                                class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a> --}}
                            <a href="{{ asset('admin/dosen-staff/edit/' . $staff->id_staff) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ asset('admin/dosen-staff/delete/' . $staff->id_staff) }}"
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

<div class="pagetitle">
    <h1>Pengguna</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
  @include('admin/user/tambah')
</p>
<form action="{{ asset('admin/user/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">

  <div class="col-md-12">
    <div class="btn-group">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
   </div>
</div>
</div>

<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
    <div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-info">
        <th width="5%">
          <div class="mailbox-controls">
                <!-- Check all button -->
               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
        <th width="30%">NAMA</th>
        <th width="20%">USERNAME</th>
        <th width="10%">LEVEL</th>
        <th width="10%">ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($user as $user) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_user[]" value="<?php echo $user->id_user ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
        <small class="text-center"><?php echo $i ?></small>
    </td>
      

    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->akses_level ?></td>
    <td>
        <div class="btn-group">
        <a href="{{ asset('admin/user/edit/'.$user->id_user) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="{{ asset('admin/user/delete/'.$user->id_user) }}" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i></a>
        </div>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
</form>
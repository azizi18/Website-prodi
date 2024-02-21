<div class="pagetitle">
  <h1>Berkas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
      <li class="breadcrumb-item active">Berkas</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<form action="{{ asset('admin/berkas/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">

  <a href="{{ asset('admin/berkas/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah File</a>
  
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
     <th width="30%">Judul Link</th>
    <th width="20%">Isi</th>
    <th width="5%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($berkas as $berkas) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_berkas" value="{{ $berkas->id_berkas }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    
   
    <td><?php echo $berkas->judul_link ?> 
    </td>
    
  <td><?php echo $berkas->isi; ?></td>
   
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/berkas/edit/'.$berkas->id_berkas) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/berkas/delete/'.$berkas->id_berkas) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>
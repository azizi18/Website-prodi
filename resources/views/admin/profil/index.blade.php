<div class="pagetitle">
  <h1>Profil</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('admin/dasbor') }}">Home</a></li>
      <li class="breadcrumb-item active">Profil</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<form action="{{ asset('admin/profil/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">

  <a href="{{ asset('admin/profil/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Data</a>
  
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
    <th width="40%">ISI</th>
    <th width="20%">KATEGORI</th>
    <th width="10%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($profil as $profil) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id_kalender" value="{{ $profil->id_profil }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td><?php echo \Illuminate\Support\Str::limit(strip_tags($profil->isi), 200, $end = '...');
      ?>
    </td>
    
    <td><?php echo $profil->nama_kategori_profil ?> 
     
    </td>
   
    
    <td>
      <div class="btn-group">
        <a href=" {{ asset('profil/kategori/'.$profil->slug_kategori_profil) }}"
                            class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
        <a href="{{ asset('admin/profil/edit/'.$profil->id_profil) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/profil/delete/'.$profil->id_profil) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>
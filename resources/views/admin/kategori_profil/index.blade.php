<p>
@include('admin/kategori_profil/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="35%">NAMA KATEGORI</th>
    <th width="25%">SLUG</th>
    <th width="15%">NO URUT</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_profil as $kategori_profil) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_profil->nama_kategori_profil ?></td>
    <td><?php echo $kategori_profil->slug_kategori_profil ?></td>
    
    <td><?php echo $kategori_profil->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_profil->id_kategori_profil ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_profil/delete/'.$kategori_profil->id_kategori_profil) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_profil/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
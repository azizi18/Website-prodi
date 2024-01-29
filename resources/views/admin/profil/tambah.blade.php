<p class="text-right">
	<a href="{{ asset('admin/profil') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/profil/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}


<div class="row form-group">
<label class="col-md-3 text-right">Kategori Profil</label>
<div class="col-md-9">
<select name="id_kategori_profil" class="form-control">

	<?php foreach($kategori_profil as $kategori_profil) { ?>
	<option value="<?php echo $kategori_profil->id_kategori_profil ?>"><?php echo $kategori_profil->nama_kategori_profil ?></option>
	<?php } ?>

</select>
</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Isi Profil</label>
	<div class="col-sm-9">
		<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi Profil"
			value="{{ old('isi') }}" required></textarea>
		   
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3 text-right">Urutan</label>
	<div class="col-md-9">
	<input type="Number" name="urutan" class="form-control" placeholder="urutan" value="{{ old('urutan') }}">
	</div>
	</div>

<div class="row form-group">
	<label class="col-md-3 text-right"></label>
	<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-info " value="Reset">
		</div>
	</div>
</div>
</form>
<script>
	CKEDITOR.replace( 'editor', {
		filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
		filebrowserUploadMethod: 'form'
	});
	</script>	
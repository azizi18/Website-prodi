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
<form action="{{ asset('admin/profil/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_profil" value="{{ $profil->id_profil }}">


<div class="row form-group">
	<label class="col-md-3 text-right">Kategori profil</label>
	<div class="col-md-9">
		<select name="id_kategori_profil" class="form-control">
			<?php foreach($kategori_profil as $kategori_profil) { ?>
				<option value="<?php echo $kategori_profil->id_kategori_profil ?>" 
					<?php if($profil->id_kategori_profil==$kategori_profil->id_kategori_profil) { echo "selected"; } ?>
					><?php echo $kategori_profil->nama_kategori_profil ?></option>
				<?php } ?>
			</select>
		</div>
	</div>


	<div class="row form-group">
		<label class="col-md-3 text-right">Isi Profil</label>
		<div class="col-md-9">
			<textarea type="text" id="editor" name="isi" class="form-control" placeholder="Isi profil"><?php echo $profil->isi ?></textarea>
		</div>
	</div>
	<div class="row form-group">
		<label class="col-md-3 text-right">Urutan</label>
		<div class="col-md-9">
			<input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?php echo $profil->urutan ?>">
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
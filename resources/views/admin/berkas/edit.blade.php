<p class="text-right">
	<a href="{{ asset('admin/berkas') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/berkas/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_berkas" value="{{ old ('id_berkas',$berkas->id_berkas )}}">

<div class="row form-group">
	<label class="col-md-3 text-right">Judul Link Berkas</label>
	<div class="col-md-9">
		<input type="text" name="judul_link" class="form-control" placeholder="Judul Link" value=" {{ old('judul_link', $berkas->judul_link) }}">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3 text-right">Isi Berkas</label>
	<div class="col-md-9">
		<textarea name="isi" class="form-control" id="editor" placeholder="Isi berita" placeholder="Isi Berkas"><?php echo $berkas->isi; ?></textarea>
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

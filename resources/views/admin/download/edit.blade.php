<p class="text-right">
	<a href="{{ asset('admin/download') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/download/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_download" value="{{ old ('id_download',$download->id_download )}}">

<div class="row form-group">
	<label class="col-md-3 text-right">Nama file/download</label>
	<div class="col-md-9">
		<input type="text" name="judul_download" class="form-control" placeholder="Nama File Download" value=" {{ old('judul_download', $download->judul_download) }}">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3 text-right">Nama Tittle Download</label>
	<div class="col-md-9">
		<input type="text" name="nama_download" class="form-control" placeholder="Nama Tittle Download" value=" {{ old('nama_download', $download->nama_download) }}">
	</div>
</div>


	<div class="row form-group">
        <label class="col-md-4 text-right">Upload File Download</label>
        <div class="col-md-4">
            <input type="file" name="file" class="form-control" placeholder="Upload File">
			<small>File saat ini:
                <br>	{{ old('file', $download->file) }}
            </small>
			<small class="text-success">Upload File Untuk Download Dalam Bentuk (pdf,word,excel dll)</small> 

        </div>

      
    </div>
	
	<div class="row form-group">
		<label class="col-md-3 text-right">Urutan</label>
		<div class="col-md-9">
			<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan', $download->urutan) }}">
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
	var options = {
	  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
	  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
	  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
	  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
	};
  </script>
  <script>
	CKEDITOR.replace('editor', options);
</script>
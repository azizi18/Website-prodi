@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/konfigurasi/proses') }}" method="post" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row">
    <div class="col-md-6">
        <h3>Basic information:</h3>
        <hr>
        <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
        <div class="form-group">
            <label>Nama Web</label>
            <input type="text" name="namaweb" placeholder="Nama Web" value="<?php echo $site->namaweb; ?>"
                required class="form-control">
        </div>


        <div class="form-group">
            <label>Singkatan</label>
            <input type="text" name="singkatan" placeholder="ABC" value="<?php echo $site->singkatan; ?>" required
                class="form-control">
        </div>

        <div class="form-group">
            <label>Ilkom tagline/motto</label>
            <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $site->tagline; ?>"
                class="form-control">
        </div>


        <div class="form-group">
            <label>Official email</label>
            <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email; ?>"
                class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jam Pelayanan Akademik </label>
            <input type="text" name="jam_pelayanan" placeholder="Jam Pelayanan Akademik" value="<?php echo $site->jam_pelayanan; ?>"
                class="form-control" required>
        </div>

        <div class="form-group">
            <label>Official email</label>
            <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email; ?>"
                class="form-control" required>
        </div>

      
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $site->alamat; ?></textarea>
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="text" name="telepon" placeholder="021-000000" value="<?php echo $site->telepon; ?>"
                class="form-control">
        </div>
        <div class="form-group">
            <label>Color Website Setting</label>
            <input type="color" name="website_color" placeholder="<?php echo $site->website_color; ?>" value="<?php echo $site->website_color; ?>"
                class="form-control">
                <?php echo $site->website_color; ?>
                
        </div>
    </div>
        <div class="col-md-6">
            <h3>Deskripsi Tentang Ilkom</h3><hr>

             
             <div class="form-group">
            <label>Tentang Ilkom</label>
            <textarea name="tentang" rows="3" id="editor" class="form-control" placeholder="Tentang ilkom"><?php echo $site->tentang; ?></textarea>
            </div>

            <h3>Gelombang Pendaftaran</h3><hr>
            <div class="form-group">
                <label>Periode 1</label>
                <input type="text" name="periode_satu" placeholder="Periode 1" value="<?php echo $site->periode_satu; ?>" required
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Periode 2</label>
                <input type="text" name="periode_dua" placeholder="Periode 2" value="<?php echo $site->periode_dua; ?>" required
                    class="form-control">
            </div>
            <div class="form-group">
                <label>Periode 3</label>
                <input type="text" name="periode_tiga" placeholder="Periode 3" value="<?php echo $site->periode_tiga; ?>" required
                    class="form-control">
                   
            </div>

           
       
            <hr>
            <div class="form-group btn-group">
                <input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
                <input type="reset" name="reset" value="Reset" class="btn btn-primary ">
            </div>
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

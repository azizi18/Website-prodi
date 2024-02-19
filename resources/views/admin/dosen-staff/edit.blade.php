<p class="text-right">
    <a href="{{ asset('admin/dosen-staff') }}" class="btn btn-success btn-sm">
        <i class="fa fa-backward"></i> Kembali
    </a>
</p>
<hr>
<?php
// Validasi error

// Error upload
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}

// Form open

?>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/dosen-staff/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_staff" value="{{ $staff->id_staff }}">
    <div class="row form-group">
        <label class="col-md-3 text-right">Status Tampil &amp; Nomor Urut tampil</label>

        <div class="col-md-3">
            <select name="status_staff" class="form-control">
                <option value="Ya">Ya, tampilkan di website</option>
                <option value="Tidak" <?php if ($staff->status_staff == 'Tidak') {
                    echo 'selected';
                } ?>>Tidak, jangan tampilkan di website</option>
            </select>
            <small>Tampilkan di website?</small>
        </div>
    
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Nama staff <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" name="nama_staff" class="form-control" placeholder="Nama staff"
                value="{{ $staff->nama_staff }}" required>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Tempat Tanggal Lahir</label>
        <div class="col-md-9">
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Alamat" value="{{ $staff->tempat_lahir }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Alamat</label>
        <div class="col-md-9">
            <textarea  name="alamat" class="form-control" placeholder="Alamat" >{{ $staff->alamat }}</textarea>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Email</label>
        <div class="col-md-9">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $staff->email }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Pendidikan S1</label>
        <div class="col-md-9">
            <input type="text" name="pendidikan_s1" class="form-control" placeholder="Pendidikan S1" value="{{ $staff->pendidikan_s1 }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Pendidkan S2</label>
        <div class="col-md-9">
            <input type="text" name="pendidikan_s2" class="form-control" placeholder="Pendidikan S2" value="{{ $staff->pendidikan_s1 }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Penelitian</label>
        <div class="col-md-9">
            <textarea  name="penelitian" class="form-control" placeholder="Penelitian">{{ $staff->penelitian }}</textarea>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Publikasi</label>
        <div class="col-md-9">
            <textarea  name="publikasi" class="form-control" placeholder="Publikasi" >{{ $staff->publikasi }}</textarea>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar/Foto</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
            <small>Gambar saat ini:
                <br><?php if($staff->gambar!="") { ?>
                <img src="{{ asset('assets/upload/staff/thumbs/' . $staff->gambar) }}" class="img img-thumbnail"
                    width="80">
                <?php } ?>
            </small>
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

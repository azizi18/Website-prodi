<p class="text-right">
    <a href="{{ asset('admin/nama-pengajar') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/nama-pengajar/tambah_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}


    <div class="row form-group">
        <label class="col-md-3 text-right">NIDN<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="text" name="nidn" class="form-control" placeholder="NIDN Dosen Pengajar"
                value="{{ old('nidn') }}" required>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">NIK/NIP<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="text" name="nik_nip" class="form-control" placeholder="NIK/NIP Dosen Pengajar"
                value="{{ old('nik_nip') }}" required>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">NAMA<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="text" name="nama" class="form-control" placeholder="NAMA Dosen Pengajar"
                value="{{ old('nama') }}" required>
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

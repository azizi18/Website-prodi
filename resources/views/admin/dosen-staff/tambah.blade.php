<p class="text-right">
    <a href="{{ asset('admin/dosen-staff') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/dosen-staff/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        <label class="col-md-3 text-right">Status Tampil</label>

        <div class="col-md-3">
            <select name="status_staff" class="form-control">
                <option value="Ya">Ya, tampilkan di website</option>
                <option value="Tidak">Tidak, jangan tampilkan di website</option>
            </select>
            <small>Tampilkan di website?</small>
        </div>
   
    </div>


    <div class="row form-group">
        <label class="col-md-3 text-right">Nama<span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" name="nama_staff" class="form-control" placeholder="Nama staff"
                value="{{ old('nama_staff') }}" required>
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-3 text-right">Tempat tanggal lahir</label>
        <div class="col-md-9">
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Tanggal Lahir" value="{{ old('tempat_lahir') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Alamat</label>
        <div class="col-md-9">
            <textarea  name="alamat" class="form-control" placeholder="alamat">{{ old('alamat') }}</textarea>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Email</label>
        <div class="col-md-9">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Pendidikan S1</label>
        <div class="col-md-9">
            <input type="text" name="pendidikan_s1" class="form-control" placeholder="Pendidikan S1" value="{{ old('pendidikan_s1') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Pendidikan S2</label>
        <div class="col-md-9">
            <input type="text" name="pendidikan_s2" class="form-control" placeholder="Pendidikan S2" value="{{ old('pendidikan_s2') }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Penelitian</label>
        <div class="col-md-9">
            <textarea  name="penelitian" class="form-control" placeholder="Penelitian">{{ old('penelitian') }}</textarea>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Publikasi</label>
        <div class="col-md-9">
            <textarea  name="publikasi" class="form-control" placeholder="Publikasi">{{ old('publikasi') }}</textarea>
        </div>
    </div>
  


    <div class="row form-group">
        <label class="col-md-3 text-right">Upload gambar/Foto</label>
        <div class="col-md-9">
            <input type="file" name="gambar" class="form-control"  placeholder="Upload gambar">
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

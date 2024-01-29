<p class="text-right">
    <a href="{{ asset('admin/semester-enam') }}" class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/semester-enam/tambah_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}


    <div class="row form-group">
        <label class="col-md-3 text-right">Kode Matakuliah<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="text" name="kode_mk" class="form-control" placeholder="Kode Matakuliah"
                value="{{ old('kode_mk') }}" required>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">Nama Matakuliah<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="text" name="nama_mk" class="form-control" placeholder="Nama Matakuliah"
                value="{{ old('nama_mk') }}" required>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-3 text-right">SKS<span class="text-danger"></span></label>
        <div class="col-md-9">
            <input type="number" name="sks" class="form-control" placeholder="Jumlah SKS"
            value="{{ old('sks') }}">
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

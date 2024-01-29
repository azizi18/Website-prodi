<p class="text-right">
    <a href="{{ asset('admin/semester-tiga') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/semester-tiga/edit_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_kurikulum" value="{{ $kurikulum->id_kurikulum}}">
    <div class="row form-group">
        <label class="col-md-3 text-right">Kode Matakuliah</label>
        <div class="col-md-6">
            <input type="text" name="kode_mk" class="form-control" placeholder="Kode Matakuliah"
                required="required" value="<?php echo $kurikulum->kode_mk; ?>">
        </div>
    </div>
   

    <div class="row form-group">
        <label class="col-md-3 text-right">Nama Matakuliah</label>
        <div class="col-md-6">
            <input type="text" name="nama_mk" class="form-control" placeholder="Nama Matakuliah"
                required="required" value="<?php echo $kurikulum->nama_mk; ?>">
        </div>
    </div>  

    <div class="row form-group">
        <label class="col-md-3 text-right">SKS</label>
        <div class="col-md-6">
            <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS"
                required="required" value="<?php echo $kurikulum->sks; ?>">
        </div>
    </div>

   

    <div class="row form-group">
        <label class="col-md-3 text-right"></label>
        <div class="col-md-9">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success ">
                    <i class="fa fa-save"></i> Simpan Data
                </button>
                <input type="reset" name="reset" class="btn btn-info " value="Reset">
            </div>

        </div>

    </div>

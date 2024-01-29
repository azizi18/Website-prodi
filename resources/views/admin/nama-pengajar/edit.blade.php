<p class="text-right">
    <a href="{{ asset('admin/nama-pengajar') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/nama-pengajar/edit_proses') }}" method="post" enctype="multipart/form-data"
    accept-charset="utf-8">
    {{ csrf_field() }}
    <input type="hidden" name="id_pengajar" value="{{ $pengajar->id_pengajar}}">
    <div class="row form-group">
        <label class="col-md-3 text-right">NIDN</label>
        <div class="col-md-6">
            <input type="text" name="nidn" class="form-control" placeholder="NIDN Dosen Pengajar"
                required="required" value="<?php echo $pengajar->nidn; ?>">
        </div>
    </div>
   

    <div class="row form-group">
        <label class="col-md-3 text-right">NIK/NIP</label>
        <div class="col-md-6">
            <input type="text" name="nik_nip" class="form-control" placeholder="NIK/NIP Dosen Pengajar"
                required="required" value="<?php echo $pengajar->nik_nip; ?>">
        </div>
    </div>  

    <div class="row form-group">
        <label class="col-md-3 text-right">NAMA</label>
        <div class="col-md-6">
            <input type="text" name="nama" class="form-control" placeholder="NAMA Dosen Pengajar"
                required="required" value="<?php echo $pengajar->nama; ?>">
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\DosenStaff_model;

class DosenStaff extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff             = new DosenStaff_model();
        $staff             = $mystaff->semua();

        $data = array(
            'title'                => 'Data Staff Dosen',
            'staff'            => $staff,
            'content'            => 'admin/dosen-staff/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new DosenStaff_model();
        $keywords           = $request->keywords;
        $staff             = $mystaff->cari($keywords);

        $data = array(
            'title'             => 'Data Dosen Staff',
            'staff'            => $staff,
            'content'           => 'admin/dosen-staff/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_staffnya       = $request->id_staff;
            for ($i = 0; $i < sizeof($id_staffnya); $i++) {
                DB::table('dosen_staff')->where('id_staff', $id_staffnya[$i])->delete();
            }
            return redirect('admin/dosen-staff')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
            $id_staffnya       = $request->id_staff;
            for ($i = 0; $i < sizeof($id_staffnya); $i++) {
                DB::table('dosen_staff')->where('id_staff', $id_staffnya[$i])->update([
                    'id_user'               => Session()->get('id_user'),
                ]);
            }
            return redirect('admin/dosen-staff')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_staff($status_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new DosenStaff_model();
        $staff             = $mystaff->status_staff($status_staff);

        $data = array(
            'title'             => 'Data Dosen staff',
            'staff'            => $staff,
            'content'           => 'admin/dosen-staff/index'
        );
        return view('admin/layout/wrapper', $data);
    }


    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $data = array(
            'title'             => 'Tambah Data Dosen Staff ',
            'content'           => 'admin/dosen-staff/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mystaff           = new DosenStaff_model();
        $staff             = $mystaff->detail($id_staff);

        $data = array(
            'title'             => 'Edit Dosen Staff',
            'staff'            => $staff,
            'content'           => 'admin/dosen-staff/edit'
        );
        return view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama_staff'  => 'required',
            'gambar'        => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
      
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/staff/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/staff/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('dosen_staff')->insert([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'tempat_lahir'                    => $request->tempat_lahir,
                'alamat'                    => $request->alamat,
                'email'                    => $request->email,
                'pendidikan_s1'                    => $request->pendidikan_s1,
                'pendidikan_s2'                    => $request->pendidikan_s2,
                'penelitian'                    => $request->penelitian,
                'publikasi'                    => $request->publikasi,
                'gambar'                => $input['nama_file'],
                'status_staff'          => $request->status_staff
            ]);
        } else {
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('dosen_staff')->insert([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'tempat_lahir'                    => $request->tempat_lahir,
                'alamat'                    => $request->alamat,
                'email'                    => $request->email,
                'pendidikan_s1'                    => $request->pendidikan_s1,
                'pendidikan_s2'                    => $request->pendidikan_s2,
                'penelitian'                    => $request->penelitian,
                'publikasi'                    => $request->publikasi,
                'status_staff'          => $request->status_staff
            ]);
        }
        
        return redirect('admin/dosen-staff')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama_staff'  => 'required',
            'gambar'        => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath        = './assets/upload/staff/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/staff/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('dosen_staff')->where('id_staff', $request->id_staff)->update([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'tempat_lahir'                    => $request->tempat_lahir,
                'alamat'                    => $request->alamat,
                'email'                    => $request->email,
                'pendidikan_s1'                    => $request->pendidikan_s1,
                'pendidikan_s2'                    => $request->pendidikan_s2,
                'penelitian'                    => $request->penelitian,
                'publikasi'                    => $request->publikasi,
                'gambar'                => $input['nama_file'],
                'status_staff'          => $request->status_staff
            ]);
        } else {
            $slug_staff = Str::slug($request->nama_staff . '-' . $request->jabatan, '-');
            DB::table('dosen_staff')->where('id_staff', $request->id_staff)->update([
                'id_user'               => Session()->get('id_user'),
                'nama_staff'            => $request->nama_staff,
                'slug_staff'            => $slug_staff,
                'tempat_lahir'                    => $request->tempat_lahir,
                'alamat'                    => $request->alamat,
                'email'                    => $request->email,
                'pendidikan_s1'                    => $request->pendidikan_s1,
                'pendidikan_s2'                    => $request->pendidikan_s2,
                'penelitian'                    => $request->penelitian,
                'publikasi'                    => $request->publikasi,             
                'status_staff'          => $request->status_staff
            ]);
        }
        
        return redirect('admin/dosen-staff')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_staff)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('dosen_staff')->where('id_staff', $id_staff)->delete();
        return redirect('dosen-staff')->with(['sukses' => 'Data telah dihapus']);
    }
}

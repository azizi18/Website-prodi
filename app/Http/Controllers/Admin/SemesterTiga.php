<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SemesterTiga_model;
use App\Imports\SemesterTigaImport;
use Maatwebsite\Excel\Facades\Excel;

class SemesterTiga extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mykurikulum           = new SemesterTiga_model();
        $kurikulum              =$mykurikulum->semua();
  
  
        $data = array(
            'title'                => 'Data Semester 3',
            'kurikulum'                 => $kurikulum,
            'content'            => 'admin/semester-tiga/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
    public function import(Request $request){
  
        request()->validate([
            'file'        => 'required|mimes:csv,xls,xlsx',
            ]);
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Datakurikulum', $namaFile);
        
        Excel::import(new SemesterTigaImport, \public_path ('/Datakurikulum/'.$namaFile));  
       
         return redirect('admin/semester-tiga')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mykurikulum          = new SemesterTiga_model();
        $keywords         = $request->keywords;
        $kurikulum            =   $mykurikulum->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Semester 3',
            'kurikulum'                => $kurikulum,
            'content'           => 'admin/semester-tiga/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_kurikulumnya       = $request->id_kurikulum;
            for ($i = 0; $i < sizeof($id_kurikulumnya); $i++) {
                DB::table('semester_tiga')->where('id_kurikulum', $id_kurikulumnya [$i])->delete();
            }
            return redirect('admin/semester-tiga')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
           $id_kurikulumnya       = $request->id_kurikulum;
            for ($i = 0; $i < sizeof($id_kurikulumnya); $i++) {
                DB::table('semester_tiga')->where('id_kurikulum', $id_kurikulumnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/semester-tiga')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kurikulum   = DB::table('semester_tiga')->get();
  
        $data = array(
            'title'             => 'Tambah Data Semester 3',
            'kurikulum'                 => $kurikulum,
            'content'           => 'admin/semester-tiga/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_kurikulum)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mykurikulum        = new SemesterTiga_model();
        $kurikulum            =    $mykurikulum->detail($id_kurikulum);
    
  
        $data = array(
            'title'             => 'Edit Data Semester 3',
            'kurikulum'            =>  $kurikulum,
            'content'           => 'admin/semester-tiga/edit'
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
            'kode_mk'          => 'required',
            'nama_mk'           => 'required',
            'sks'           => 'required'
        ]);
  
        DB::table('semester_tiga')->insert([
            'id_user'                => Session()->get('id_user'),
            'kode_mk'                   => $request->kode_mk,
            'nama_mk'                   => $request->nama_mk,
            'sks'                 => $request->sks
        ]);
        return redirect('admin/semester-tiga')->with(['sukses' => 'Data telah ditambah']);
    }
  
    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'kode_mk'          => 'required',
            'nama_mk'           => 'required',
            'sks'           => 'required'
        ]);
        
            DB::table('semester_tiga')->where('id_kurikulum', $request->id_kurikulum)->update([
                'id_user'                   => Session()->get('id_user'),
                'kode_mk'                   => $request->kode_mk,
                'nama_mk'                   => $request->nama_mk,
                'sks'                       => $request->sks
            ]);
        
  
        return redirect('admin/semester-tiga')->with(['sukses' => 'Data telah diupdate']);
    }
    // Delete
    public function delete($id_kurikulum)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('semester_tiga')->where('id_kurikulum', $id_kurikulum)->delete();
        return redirect('admin/semester-tiga')->with(['sukses' => 'Data telah dihapus']);
    }
  }

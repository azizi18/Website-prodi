<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NamaPengajar_model;
use App\Imports\PengajarImport;
use Maatwebsite\Excel\Facades\Excel;

class NamaPengajar extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypengajar           = new NamaPengajar_model();
        $pengajar              =$mypengajar->semua();
  
  
        $data = array(
            'title'                => 'Data Nama Pengajar',
            'pengajar'                  => $pengajar,
            'content'            => 'admin/nama-pengajar/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
    public function import(Request $request){
  
        request()->validate([
            'file'        => 'required|mimes:csv,xls,xlsx',
            ]);
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Datadosen', $namaFile);
        
        Excel::import(new PengajarImport, \public_path ('/Datadosen/'.$namaFile));  
       
         return redirect('admin/nama-pengajar')->with(['sukses' => 'Data telah ditambah']);
  
    }
    
  
    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypengajar          = new NamaPengajar_model();
        $keywords         = $request->keywords;
        $pengajar            =   $mypengajar->cari($keywords);
       
  
        $data = array(
            'title'             => 'Data Nama Pengajar',
            'pengajar'                => $pengajar,
            'content'           => 'admin/nama-pengajar/index'
        );
        return view('admin/layout/wrapper', $data);
    }
    
  
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_pengajarnya       = $request->id_pengajar;
            for ($i = 0; $i < sizeof($id_pengajarnya); $i++) {
                DB::table('nama_pengajar')->where('id_pengajar', $id_pengajarnya [$i])->delete();
            }
            return redirect('admin/nama-pengajar')->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['update'])) {
           $id_pengajarnya       = $request->id_rpl;
            for ($i = 0; $i < sizeof($id_pengajarnya); $i++) {
                DB::table('nama_pengajar')->where('id_pengajar', $id_pengajarnya [$i])->update([
                    'id_user'               => Session()->get('id_user'),
                   
                ]);
            }
            return redirect('admin/nama-pengajar')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }
  
  
    // // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $pengajar   = DB::table('nama_pengajar')->get();
  
        $data = array(
            'title'             => 'Tambah Data Nama Pengajar',
            'pengajar'                 => $pengajar,
            'content'           => 'admin/nama-pengajar/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }
  
    // edit
    public function edit($id_pengajar)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mypengajar        = new NamaPengajar_model();
        $pengajar            =    $mypengajar->detail($id_pengajar);
    
  
        $data = array(
            'title'             => 'Edit Data Nama Pengajar',
            'pengajar'            =>  $pengajar,
            'content'           => 'admin/nama-pengajar/edit'
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
            'nama'           => 'required'
        ]);
  
        DB::table('nama_pengajar')->insert([
            'id_user'                => Session()->get('id_user'),
            'nidn'                   => $request->nidn,
            'nik_nip'                   => $request->nik_nip,
            'nama'                 => $request->nama
        ]);
        return redirect('admin/nama-pengajar')->with(['sukses' => 'Data telah ditambah']);
    }
  
    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama'          => 'required'
            
        ]);
        
            DB::table('nama_pengajar')->where('id_pengajar', $request->id_pengajar)->update([
                'id_user'                => Session()->get('id_user'),
                'nidn'                   => $request->nidn,
                'nik_nip'                   => $request->nik_nip,
                'nama'                 => $request->nama
            ]);
        
  
        return redirect('admin/nama-pengajar')->with(['sukses' => 'Data telah diupdate']);
    }
    // Delete
    public function delete($id_pengajar)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('nama_pengajar')->where('id_pengajar', $id_pengajar)->delete();
        return redirect('admin/nama-pengajar')->with(['sukses' => 'Data telah dihapus']);
    }
  }

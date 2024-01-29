<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Skripsi_model;

class Skripsi extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myskripsi     = new Skripsi_model();
        $skripsi       = $myskripsi->semua();
        $kategori     = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'       => 'Data Skripsi',
            'skripsi'      => $skripsi,
            'kategori'    => $kategori,
            'content'     => 'admin/skripsi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data Skripsi'
        );
        return view('admin/skripsi/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myskripsi           = new Skripsi_model();
        $keywords           = $request->keywords;
        $skripsi             = $myskripsi->cari($keywords);
        $kategori           = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data Skripsi',
            'skripsi'            => $skripsi,
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site           = DB::table('konfigurasi')->first();
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if (isset($_POST['hapus'])) {
            $id_skripsinya       = $request->id_skripsi;
            for ($i = 0; $i < sizeof($id_skripsinya); $i++) {
                DB::table('skripsi')->where('id_berita', $id_skripsinya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['draft'])) {
            $id_skripsinya       = $request->id_skripsi;
            for ($i = 0; $i < sizeof($id_skripsinya); $i++) {
                DB::table('skripsi')->where('id_skripsi', $id_skripsinya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_berita' => 'Draft'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
            // PROSES SETTING PUBLISH
        } elseif (isset($_POST['publish'])) {
            $id_skripsinya       = $request->id_skripsi;
            for ($i = 0; $i < sizeof($id_skripsinya); $i++) {
                DB::table('skripsi')->where('id_skripsi', $id_skripsinya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_skripsi' => 'Publish'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        } elseif (isset($_POST['update'])) {
            $id_beritanya       = $request->id_skripsi;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table('skripsi')->where('id_skripsi', $id_beritanya[$i])->update([
                    'id_user'        => Session()->get('id_user'),
                    'id_kategori'    => $request->id_kategori
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    
//Status
public function status_berita($status_skripsi)
{
    if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    Paginator::useBootstrap();
    $myskripsi   = new Skripsi_model();
    $skripsi    = $myskripsi->status_skripsi($status_skripsi);
    $kategori    = DB::table('kategori_skripsi')->orderBy('urutan','ASC')->get();

    $data = array(  'title'             => 'Status Berita: '.$status_skripsi,
                    'berita'            => $skripsi,
                    'kategori'   => $kategori,
                    'content'           => 'admin/skripsi/index'
                );
    return view('admin/layout/wrapper',$data);
}
    //Status
    public function jenis_skripsi($jenis_skripsi)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myskripsi    = new Skripsi_model();
        $skripsi      = $myskripsi->jenis_skripsi($jenis_skripsi);
        $kategori    = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Jenis skripsi: ' . $jenis_skripsi,
            'skripsi'            => $skripsi,
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Status
    public function author($id_user)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myskripsi          = new Skripsi_model();
        $skripsi            = $myskripsi->author($id_user);
        $kategori    = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();
        $author    = DB::table('users')->where('id_user', $id_user)->orderBy('id_user', 'ASC')->first();

        $data = array(
            'title'             => 'Data Skripsi dengan Penulis: ' . $author->nama,
            'skripsi'            => $skripsi,
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myskripsi   = new Skripsi_model();
        $skripsi      = $myskripsi->all_kategori($id_kategori);
        $kategori    = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();
        $detail      = DB::table('kategori_skripsi')->where('id_kategori', $id_kategori)->first();
        $data = array(
            'title'             => 'Kategori: ' . $detail->nama_kategori,
            'skripsi'            => $skripsi,
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori    = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Skripsi',
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_skripsi)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myskripsi           = new Skripsi_model();
        $skripsi            = $myskripsi->detail($id_skripsi);
        $kategori    = DB::table('kategori_skripsi')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit Skripsi',
            'skripsi'            => $skripsi,
            'kategori'   => $kategori,
            'content'           => 'admin/skripsi/edit'
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
            'judul_skripsi'  => 'required|unique:skripsi',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:8024',



        ]);
        if ($request->hasFile('file')) {
            $image                  = $request->file('file');
        $filenamewithextension  = $request->file('file')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = './assets/upload/file/';
        $image->move($destinationPath, $input['nama_file']);
       
        } else{
            $input['nama_file'] = null;
        }
            $slug_skripsi = Str::slug($request->judul_skripsi, '-');
            DB::table('skripsi')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_skripsi'       => $slug_skripsi,
                'judul_skripsi'      => $request->judul_skripsi,
                'file'            => $input['nama_file'],
                'isi'               => $request->isi,
                'jenis_skripsi'      => $request->jenis_skripsi,
                'status_skripsi'      => $request->status_skripsi,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
                'urutan'            => $request->urutan,
                'hits'            => $request->hits,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        
        
            return redirect('admin/skripsi')->with(['sukses' => 'Data telah ditambah']);
        
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul_skripsi'   => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:8024',

        ]);
        if ($request->hasFile('file')) {
            $image                  = $request->file('file');
        $filenamewithextension  = $request->file('file')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = './assets/upload/file/';
        $image->move($destinationPath, $input['nama_file']);
       
        } else{
            $input['nama_file'] = null;
        }
        
            $slug_skripsi = Str::slug($request->judul_skripsi, '-');
            DB::table('skripsi')->where('id_skripsi', $request->id_skripsi)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_skripsi'       => $slug_skripsi,
                'judul_skripsi'      => $request->judul_skripsi,
                'file'                => $input['nama_file'],
                'isi'               => $request->isi,
                'jenis_skripsi'      => $request->jenis_skripsi,
                'status_skripsi'     => $request->status_skripsi,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
                'urutan'            => $request->urutan,              
                 'hits'            => $request->hits

            ]);
        
    
            return redirect('admin/skripsi')->with(['sukses' => 'Data telah diupdate']);
        
    }

    // Delete
    public function delete($id_skripsi)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('skripsi')->where('id_skripsi', $id_skripsi)->delete();
        return redirect('admin/skripsi')->with(['sukses' => 'Data telah dihapus']);
    }
}

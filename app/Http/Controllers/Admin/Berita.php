<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Berita_model;

class Berita extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myberita     = new Berita_model();
        $berita     = $myberita->berita_update();
        $kategori     = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'       => 'Data Berita',
            'berita'      => $berita,
            'beritas'      => $berita,
            'kategori'    => $kategori,
            'content'     => 'admin/berita/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data Berita'
        );
        return view('admin/berita/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myberita           = new Berita_model();
        $keywords           = $request->keywords;
        $berita             = $myberita->cari($keywords);
        $kategori           = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Data Berita',
            'berita'            => $berita,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/index'
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
            $id_beritanya       = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table('berita')->where('id_berita', $id_beritanya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST['draft'])) {
            $id_beritanya       = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table('berita')->where('id_berita', $id_beritanya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_berita' => 'Draft'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
            // PROSES SETTING PUBLISH
        } elseif (isset($_POST['publish'])) {
            $id_beritanya       = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table('berita')->where('id_berita', $id_beritanya[$i])->update([
                    'id_user'       => Session()->get('id_user'),
                    'status_berita' => 'Publish'
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
        } elseif (isset($_POST['update'])) {
            $id_beritanya       = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table('berita')->where('id_berita', $id_beritanya[$i])->update([
                    'id_user'        => Session()->get('id_user'),
                    'id_kategori'    => $request->id_kategori
                ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    
//Status
public function status_berita($status_berita)
{
    if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    Paginator::useBootstrap();
    $myberita    = new Berita_model();
    $berita      = $myberita->status_berita($status_berita);
    $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

    $data = array(  'title'             => 'Status Berita: '.$status_berita,
                    'berita'            => $berita,
                    'kategori'   => $kategori,
                    'content'           => 'admin/berita/index'
                );
    return view('admin/layout/wrapper',$data);
}
    //Status
    public function jenis_berita($jenis_berita)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myberita    = new Berita_model();
        $berita      = $myberita->jenis_berita($jenis_berita);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Jenis Berita: ' . $jenis_berita,
            'berita'            => $berita,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/index'
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
        $myberita           = new Berita_model();
        $berita             = $myberita->author($id_user);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();
        $author    = DB::table('users')->where('id_user', $id_user)->orderBy('id_user', 'ASC')->first();

        $data = array(
            'title'             => 'Data Berita dengan Penulis: ' . $author->nama,
            'berita'            => $berita,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/index'
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
        $myberita    = new Berita_model();
        $berita      = $myberita->all_kategori($id_kategori);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();
        $detail      = DB::table('kategori')->where('id_kategori', $id_kategori)->first();
        $data = array(
            'title'             => 'Kategori: ' . $detail->nama_kategori,
            'berita'            => $berita,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Berita',
            'kategori'   => $kategori,
            'content'           => 'admin/berita/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_berita)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myberita           = new Berita_model();
        $berita             = $myberita->detail($id_berita);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit Berita',
            'berita'            => $berita,
            'kategori'   => $kategori,
            'content'           => 'admin/berita/edit'
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
            'judul_berita'  => 'required|unique:berita',

        ]);

     $slug_berita = Str::slug($request->judul_berita, '-');
         DB::table('berita')->insert([
             'id_kategori'       => $request->id_kategori,
             'id_user'           => Session()->get('id_user'),
             'slug_berita'       => $slug_berita,
             'judul_berita'      => $request->judul_berita,
             'isi'               => $request->isi,
             'jenis_berita'      => $request->jenis_berita,
             'status_berita'      => $request->status_berita,
             'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
             'urutan'            => $request->urutan,
             'tanggal_post'      => date('Y-m-d H:i:s')
         ]);
        
        if ($request->jenis_berita == "Berita") {
            return redirect('admin/berita')->with(['sukses' => 'Data telah ditambah']);
        } else {
            return redirect('admin/berita/jenis_berita/' . $request->jenis_berita)->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul_berita'   => 'required',
            'gambar'        => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',

        ]);
        
            
            $slug_berita = Str::slug($request->judul_berita, '-');
            DB::table('berita')->where('id_berita', $request->id_berita)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_berita'       => $slug_berita,
                'judul_berita'      => $request->judul_berita,
                'isi'               => $request->isi,
                'jenis_berita'      => $request->jenis_berita,
                'status_berita'     => $request->status_berita,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)),
                'urutan'            => $request->urutan
            ]);
        
        if ($request->jenis_berita == "Berita") {
            return redirect('admin/berita')->with(['sukses' => 'Data telah diupdate']);
        } else {
            return redirect('admin/berita/jenis_berita/' . $request->jenis_berita)->with(['sukses' => 'Data telah diupdate']);
        }
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->move(public_path('upload'), $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/'.$filenametostore);
            $msg = 'File Berhasil diupload';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
    

    // Delete
    public function delete($id_berita)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('berita')->where('id_berita', $id_berita)->delete();
        return redirect('admin/berita')->with(['sukses' => 'Data telah dihapus']);
    }
}

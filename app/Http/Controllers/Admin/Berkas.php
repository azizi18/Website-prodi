<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Berkas_model;

class Berkas extends Controller
{
    // Main page
    public function index()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        Paginator::useBootstrap();
        $myberkas     = new Berkas_model();
        $berkas     = $myberkas ->semua();

        $data = array(
            'title'       => 'Data Berkas',
            'berkas'      => $berkas,
            'content'     => 'admin/berkas/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {
        $data = array(
            'title'       => 'Data Berkas'
        );
        return view('admin/instagram/add', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myberkas          = new Berkas_model();
        $keywords           = $request->keywords;
        $berkas             = $myberkas->cari($keywords);

        $data = array(
            'title'             => 'Data Berkas ',
            'berkas'            => $berkas ,
            'content'           => 'admin/berkas/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    // public function proses(Request $request)
    // {
       
    //     $pengalihan     = $request->pengalihan;
    //     // PROSES HAPUS MULTIPLE
    //     if (isset($_POST['hapus'])) {
    //         $id_instagramnya       = $request->id_instagram;
    //         for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
    //             DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->delete();
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
    //         // PROSES SETTING DRAFT
    //     } elseif (isset($_POST['draft'])) {
    //         $id_instagramnya       = $request->id_instagram;
    //         for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
    //             DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->update([
    //                 'id_user'       => Session()->get('id_user'),
    //                 'status_berita' => 'Draft'
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
    //         // PROSES SETTING PUBLISH
    //     } elseif (isset($_POST['publish'])) {
    //         $id_instagramnya       = $request->id_instagram;
    //         for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
    //             DB::table('instagram')->where('id_berita', $id_instagramnya[$i])->update([
    //                 'id_user'       => Session()->get('id_user'),
                    
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
    //     } elseif (isset($_POST['update'])) {
    //         $id_instagramnya       = $request->id_instagram;
    //         for ($i = 0; $i < sizeof($id_instagramnya); $i++) {
    //             DB::table('instagram')->where('id_instagram', $id_instagramnya[$i])->update([
    //                 'id_user'        => Session()->get('id_user'),
    //                 'id_kategori'    => $request->id_kategori
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
    //     }
    // }



    // Tambah
    public function tambah()
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $data = array(
            'title'             => 'Tambah Berkas',
            'content'           => 'admin/berkas/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_berkas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $myberkas            = new Berkas_model();
        $berkas              = $myberkas ->detail($id_berkas);

        $data = array(
            'title'             => 'Edit Berkas',
            'berkas'            => $berkas,
            'content'           => 'admin/berkas/edit'
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
            'judul_link'      => 'required',
            'isi'      => 'required',
          
           
        ]);
        
            DB::table('berkas')->insert([
                'id_user'           => Session()->get('id_user'),
                'judul_link'            => $request->judul_link,
                'isi'            => $request->isi
            ]);
        
       
            return redirect('admin/berkas')->with(['sukses' => 'Data telah ditambah']);
     
            
    }

    // edit
    public function edit_proses(Request $request)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'judul_link'      => 'required',
            'isi'      => 'required',
           
        ]);
       
         
            DB::table('berkas')->where('id_berkas', $request->id_berkas)->update([
                'id_user'           => Session()->get('id_user'),
                'judul_link'            => $request->judul_link,
                'isi'            => $request->isi
            ]);
        
            return redirect('admin/berkas')->with(['sukses' => 'Data telah diupdate']);
           
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
    public function delete($id_berkas)
    {
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('berkas')->where('id_berkas', $id_berkas)->delete();
        return redirect('admin/berkas')->with(['sukses' => 'Data telah dihapus']);
    }
}

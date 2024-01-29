<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Profil_model;

class Profil extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$myprofil		    = new Profil_model();
		$profil 			= $myprofil->semua();
		$kategori_profil	= DB::table('kategori_profil')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Profil Ilmu Komputer',
						'profil'			=> $profil,
						'kategori_profil'	=> $kategori_profil,
                        'content'			=> 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil		= new Profil_model();
        $keywords           = $request->keywords;
		$profil 			= $myprofil->cari($keywords);
		$kategori_profil	= DB::table('kategori_profil')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Profil Ilmu Komputer',
						'profil'			=> $profil,
						'kategori_profil'	=> $kategori_profil,
                        'content'			=> 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof( $id_profilnya);$i++) {
                DB::table('profil')->where('id_profil', $id_profilnya[$i])->delete();
            }
            return redirect('admin/profil')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_profilnya       = $request->id_profil;
            for($i=0; $i < sizeof($id_profilnya);$i++) {
                DB::table('kalender')->where('id_profil',$id_profilnya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_profil'    => $request->id_kategori_profil
                    ]);
            }
            return redirect('admin/profil')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    

    //Kategori
    public function kategori($id_kategori_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil            = $myprofil->all_kategori_download($id_kategori_profil);
        $kategori_profil    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Profil Ilmu Komputer',
                        'profil'            => $profil,
                        'kategori_profil'   => $kategori_profil,
                        'content'           => 'admin/profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_profil    = DB::table('kategori_profil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Profil',
                        'kategori_profil'   => $kategori_profil,
                        'content'           => 'admin/profil/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }


    // edit
    public function edit($id_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myprofil           = new Profil_model();
        $profil             = $myprofil->detail($id_profil);
        $kategori_profil    = DB::table('kategori_profil')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Profil',
                        'profil'            => $profil,
                        'kategori_profil'   => $kategori_profil,
                        'content'           => 'admin/profil/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
       
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'urutan'  => 'required',
                            'isi'  => 'required',
                            ]);
      
        DB::table('profil')->insert([
            'id_kategori_profil'  => $request->id_kategori_profil,
            'id_user'               => Session()->get('id_user'),
            'urutan'                => $request->urutan,
            'isi'                  => $request->isi
        ]);
        return redirect('admin/profil')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'urutan'    => 'required',
                            'isi'  => 'required',
                            ]);
        
            // END UPLOAD
            DB::table('profil')->where('id_profil',$request->id_profil)->update([
                'id_kategori_profil'    => $request->id_kategori_profil,
                'id_user'               => Session()->get('id_user'),
                'urutan'                => $request->urutan,
                'isi'                   => $request->isi
            ]);
        
        return redirect('admin/profil')->with(['sukses' => 'Data telah diupdate']);
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
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    // Delete
    public function delete($id_profil)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('profil')->where('id_profil',$id_profil)->delete();
        return redirect('admin/profil')->with(['sukses' => 'Data telah dihapus']);
    }
}

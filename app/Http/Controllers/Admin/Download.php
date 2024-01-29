<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Download_model;

class Download extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mydownload 			= new Download_model();
		$download 			= $mydownload->semua();

		$data = array(  'title'				=> 'Data Berkas',
						'download'			=> $download,
                        'content'			=> 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $keywords           = $request->keywords;
        $download             = $mydownload->cari($keywords);

        $data = array(  'title'             => 'Data Berkas',
                        'download'            => $download,
                        'content'           => 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_downloadnya       = $request->id_download;
            for($i=0; $i < sizeof($id_downloadnya);$i++) {
                DB::table('download')->where('id_download',$id_downloadnya[$i])->delete();
            }
            return redirect('admin/download')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_downloadnya       = $request->id_download;
            for($i=0; $i < sizeof($id_downloadnya);$i++) {
                DB::table('download')->where('id_download',$id_downloadnya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_download'    => $request->id_kategori_download
                    ]);
            }
            return redirect('admin/download')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_download($status_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $download             = $mydownload->status_download($status_download);

        $data = array(  'title'             => 'Data Berkas',
                        'download'            => $download,
                        'content'           => 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

 

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}

        $data = array(  'title'             => 'Tambah Berkas',
                        'content'           => 'admin/download/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Unduh
    public function unduh($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload = new Download_model();
        $download   = $mydownload->detail($id_download);
        $hits       = $download->hits+1;
        DB::table('download')->where('id_download',$download->id_download)->update([
            'hits'      => $hits
        ]);
        $pathToFile           = './public/upload/file/'.$download->gambar;
        return response()->download($pathToFile, $download->gambar);
    }

    // edit
    public function edit($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $download             = $mydownload->detail($id_download);

        $data = array(  'title'             => 'Edit Berkas',
                        'download'            => $download,
                        'content'           => 'admin/download/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
       
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_download'  => 'required',
                            'nama_download'  => 'required',
                            
                            ]);
    
        $image                  = $request->file('file');
        $filenamewithextension  = $request->file('file')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = './assets/upload/file/';
        $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
           
            DB::table('download')->insert([
                'id_user'           => Session()->get('id_user'),
                'file'            => $input['nama_file'],
                'judul_download'            => $request->judul_download,
                'nama_download'            => $request->nama_download,
                'urutan'            => $request->urutan
            ]);
        return redirect('admin/download')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_download'    => 'required',
                            'nama_download'    => 'required',
                          
                            ]);
        
                            $image                  = $request->file('file');
                            if(!empty($image)) {
                                $filenamewithextension  = $request->file('file')->getClientOriginalName();
                                $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                                $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
                                $destinationPath = './assets/upload/file';
                                $image->move($destinationPath, $input['nama_file']);
                                // END UPLOAD                
         
            DB::table('download')->where('id_download', $request->id_download)->update([
                'id_user'           => Session()->get('id_user'),
                'file'            => $input['nama_file'],
                'judul_download'            => $request->judul_download,
                'nama_download'            => $request->nama_download,
                'urutan'            => $request->urutan
            ]);
        } else {

            DB::table('download')->where('id_download', $request->id_download)->update([
                'id_user'           => Session()->get('id_user'),
                'judul_download'              => $request->judul_download,
                'nama_download'            => $request->nama_download,
                'urutan'            => $request->urutan
            ]);
        }
        
        return redirect('admin/download')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('download')->where('id_download',$id_download)->delete();
        return redirect('admin/download')->with(['sukses' => 'Data telah dihapus']);
    }
}

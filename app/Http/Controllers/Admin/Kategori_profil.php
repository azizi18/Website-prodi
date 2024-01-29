<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_profil extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_profil 	= DB::table('kategori_profil')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Profil',
						'kategori_profil'	=> $kategori_profil,
                        'content'           => 'admin/kategori_profil/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_profil' => 'required|unique:kategori_profil',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_profil = Str::slug($request->nama_kategori_profil, '-');
        DB::table('kategori_profil')->insert([
            'nama_kategori_profil'  => $request->nama_kategori_profil,
            'slug_kategori_profil'	=> $slug_kategori_profil,
            'urutan'   		        => $request->urutan
            
        ]);
        return redirect('admin/kategori_profil')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_profil' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_profil = Str::slug($request->nama_kategori_profil, '-');
        DB::table('kategori_profil')->where('id_kategori_profil',$request->id_kategori_profil)->update([
            'nama_kategori_profil'  => $request->nama_kategori_profil,
            'slug_kategori_profil'	=> $slug_kategori_profil,
            'urutan'                => $request->urutan
            
        ]);
        return redirect('admin/kategori_profil')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_profil)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_profil')->where('id_kategori_profil',$id_kategori_profil)->delete();
    	return redirect('admin/kategori_profil')->with(['sukses' => 'Data telah dihapus']);
    }
}

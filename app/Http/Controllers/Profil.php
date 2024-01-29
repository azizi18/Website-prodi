<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;


class Profil extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $kategori_profil= DB::table('kategori_profil')
                    ->orderBy('kategori_profil.urutan','ASC')
                    ->get();

		$data = array(  'title'		             => 'Dokumen '.website('namaweb'),
						'deskripsi'	          => 'Dokumen '.website('namaweb'),
						'keywords'	           => 'Dokumen '.website('namaweb'),
						'kategori_profil'	  => $kategori_profil,
                        'content'	          => 'profil/kategori'
                    );
        return view('layout/wrapper',$data);
    }

    // Main page
    public function kategori($slug_kategori_profil)
    {
        
        $kategori   = DB::table('kategori_profil')
                    ->where('kategori_profil.slug_kategori_profil',$slug_kategori_profil)
                    ->first();
        $profil = DB::table('profil')
                    ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
                    ->select('profil.*', 'kategori_profil.nama_kategori_profil')
                    ->where('profil.id_kategori_profil',$kategori->id_kategori_profil)
                    ->orderBy('profil.id_profil','DESC')
                    ->get();

        $data = array(  'title'     => $kategori->nama_kategori_profil,
                        'deskripsi' => $kategori->nama_kategori_profil,
                        'keywords'  => $kategori->nama_kategori_profil,
                        'profil' => $profil,
                        'kategori'  => $kategori,
                        'content'   => 'profil/index'
                    );
        return view('layout/wrapper',$data);
    }

   

    

}

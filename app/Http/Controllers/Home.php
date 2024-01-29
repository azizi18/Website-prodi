<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Berita_model;
use App\Models\Pengumuman_model;
use App\Models\Skripsi_model;

class Home extends Controller
{
    // Homepage
    public function index()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $slider         = DB::table('galeri')->get();
        $news           = new Berita_model();
        $berita         = $news->home();
        $baru           = new Pengumuman_model();
        $pengumuman        = $baru->home();
        $new           = new Skripsi_model();
        $skripsi       =   $new->semua();
       
        $data = array(
            'title'         => $site_config->namaweb . ' - ' . $site_config->tagline,
            'deskripsi'     => $site_config->namaweb . ' - ' . $site_config->tagline,
            'keywords'      => $site_config->namaweb . ' - ' . $site_config->tagline,
            'slider'        => $slider,
            'site_config'   => $site_config,
            'berita'        => $berita,
            'pengumuman'    => $pengumuman,
            'skripsi'        => $skripsi,
            'beritas'       => $berita,
            'content'       => 'home/index'
        );
        return view('layout/wrapper', $data);
    }
    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
        $search = DB::table('pengumuman')
        ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
        ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
        ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
        ->where('pengumuman.judul_pengumuman', 'LIKE', "%{$keywords}%")
        ->orWhere('pengumuman.isi', 'LIKE', "%{$keywords}%")
        ->orderBy('id_pengumuman', 'DESC')
        ->paginate(25);

        $search_berita = DB::table('berita')
        ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori', 'LEFT')
        ->join('users', 'users.id_user', '=', 'berita.id_user', 'LEFT')
        ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
        ->where('berita.judul_berita', 'LIKE', "%{$keywords}%")
        ->orWhere('berita.isi', 'LIKE', "%{$keywords}%")
        ->orderBy('id_berita', 'DESC')
        ->paginate(25);
        $search_skripsi =DB::table('skripsi')
        ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
        ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
        ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
        ->where('skripsi.judul_skripsi', 'LIKE', "%{$keywords}%")
        ->orWhere('skripsi.isi', 'LIKE', "%{$keywords}%")
        ->orderBy('id_skripsi', 'DESC')
        ->paginate(25);

        // $mysearch           = new pengumuman_model();
        // $keywords           = $request->keywords;
        // $search            = $mysearch->cari($keywords);

        // $mysearch           = new berita_model();
        // $keywords           = $request->keywords;
        // $search_berita           = $mysearch->cari($keywords);

        $data = array(
           
            'search'      => $search,
            'search_berita'      =>  $search_berita,
            'search_skripsi'      =>  $search_skripsi,
            'content'   => 'home/search'
        );

        return view('layout/wrapper', $data);
    }

    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(
            'title'     => 'Menghubungi ' . $site_config->namaweb,
            'deskripsi' => 'Kontak ' . $site_config->namaweb,
            'keywords'  => 'Kontak ' . $site_config->namaweb,
            'site_config'      => $site_config,
            'content'   => 'home/index'
        );
        return view('layout/wrapper', $data);
    }
}

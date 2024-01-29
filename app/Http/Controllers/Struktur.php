<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Staff_model;

class Struktur extends Controller
{
    // Main page
    public function index()
    {
        $site       = DB::table('konfigurasi')->first();
        $dosen_staff = DB::table('prodi_staff')
        ->select('*')
        ->orderBy('id_staff','DESC');

       

        $data = array(
            'title'     => 'Tentang '. $site->namaweb,
            'deskripsi' => 'Tentang '. $site->namaweb,
            'keywords'  => 'Tentang '. $site->namaweb,
            'site'      => $site,
            'dosen_staff'     => $dosen_staff,
            'content'	=> 'profil/struktur-organisasi'
        );
        return view('layout/wrapper', $data);
    }
    
    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TenagaPengajar extends Controller
{

    public function index()
    {

        $site       = DB::table('konfigurasi')->first();
        $dosen_staff = DB::table('dosen_staff')
        ->select('*')
        ->orderBy('id_staff','DESC');
        $pengajar = DB::table('nama_pengajar')
        ->select('*')
        ->orderBy('id_pengajar','ASC')
        ->get();
       
        $data = array(
            'title'     => 'Tentang '. $site->namaweb,
            'deskripsi' => 'Tentang '. $site->namaweb,
            'keywords'  => 'Tentang '. $site->namaweb,
            'site'      => $site,
            'dosen_staff'     => $dosen_staff,
            'pengajar'     => $pengajar,
            'content'	=> 'tenaga-pengajar/index'
        );
        return view('layout/wrapper', $data);
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Berkas extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $berkas = DB::table('berkas')
                    ->select('berkas.*')
                    ->orderBy('berkas.judul_link','ASC')
                    ->paginate(25);

        $data = array(  
                        'berkas' => $berkas,
                        'content'   => 'akademik/berkas/index'
                    );
        return view('layout/wrapper',$data);
    }

    

}

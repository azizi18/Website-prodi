<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Kurikulum extends Controller
{
    public function index()
    {

       
        $semester_satu = DB::table('semester_satu')
                    ->select('*')
                    ->orderBy('id_kurikulum','ASC')
                    ->get();
                     
        $semester_dua = DB::table('semester_dua')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_tiga = DB::table('semester_tiga')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_empat = DB::table('semester_empat')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_lima = DB::table('semester_lima')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_enam = DB::table('semester_enam')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_tujuh = DB::table('semester_tujuh')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
        $semester_delapan = DB::table('semester_delapan')
        ->select('*')
        ->orderBy('id_kurikulum','ASC')
        ->get();
      
$data = array( 
            'semester_dua'	         => $semester_dua,
            'semester_satu'	         => $semester_satu,
            'semester_tiga'	         => $semester_tiga,
            'semester_empat'	     => $semester_empat,
            'semester_lima'	         => $semester_lima,
            'semester_enam'	         => $semester_enam,
            'semester_tujuh'	         => $semester_tujuh,
            'semester_delapan'	         => $semester_delapan,
            'content'	          => 'akademik/kurikulum/index'
        );
return view('layout/wrapper',$data);
    }
}

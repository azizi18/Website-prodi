<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Download_model;

class Download extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $download = DB::table('download')
                    ->select('download.*')
                    ->orderBy('download.urutan','ASC')
                    ->paginate(25);

        $data = array(  
                        'download' => $download,
                        'content'   => 'akademik/berkas/index'
                    );
        return view('layout/wrapper',$data);
    }

    
     // Unduh
     public function unduh($id_download)
     {
         $mydownload = new Download_model();
         $download   = $mydownload->detail($id_download);
         $hits       = $download->hits+1;
         DB::table('download')->where('id_download',$download->id_download)->update([
             'hits'      => $hits
         ]);
         $pathToFile           = './assets/upload/file/'.$download->file;
         return response()->download($pathToFile, $download->file);
     }

}

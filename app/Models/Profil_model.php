<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profil_model extends Model
{

	protected $table 		= "profil";
	protected $primaryKey 	= 'id_profil';

    // listing
    public function semua()
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->orderBy('profil.id_profil','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_download.nama_kategori_profil')
            ->where('profil.judul_profil', 'LIKE', "%{$keywords}%") 
            ->orWhere('profil.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where('status_profil','Publish')
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_download($id_kategori_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profilslug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where(array(  'profil.status_profil'         => 'Publish',
                            'profil.id_kategori_profil'    => $id_kategori_download))
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_download($id_kategori_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where(array(  'profil.id_kategori_profil'    => $id_kategori_download))
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_download($status_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where(array(  'profil.status_profil'         => $status_download))
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function detail_kategori_download($id_kategori_download)
    {
        $query = DB::table('profil')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'profil.id_kategori_download','LEFT')
            ->select('profil.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'profil.status_download'         => 'Publish',
                            'profil.id_kategori_download'    => $id_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('profil')
            ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'profil.id_kategori_download','LEFT')
            ->select('profil.*', 'kategori_download.slug_kategori_download', 'kategori_download.nama_kategori_download')
            ->where(array(  'profil.status_download'                  => 'Publish',
                            'kategori_download.slug_kategori_download'  => $slug_kategori_download))
            ->orderBy('id_download','DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_download($slug_kategori_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where(array(  'profil.status_profil'                  => 'Publish',
                            'kategori_profil.slug_kategori_profil'  => $slug_kategori_download))
            ->orderBy('id_profil','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where('profil.slug_profil',$slug_download)
            ->orderBy('id_profil','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_download)
    {
        $query = DB::table('profil')
            ->join('kategori_profil', 'kategori_profil.id_kategori_profil', '=', 'profil.id_kategori_profil','LEFT')
            ->select('profil.*', 'kategori_profil.slug_kategori_profil', 'kategori_profil.nama_kategori_profil')
            ->where('profil.id_profil',$id_download)
            ->orderBy('id_profil','DESC')
            ->first();
        return $query;
    }

}

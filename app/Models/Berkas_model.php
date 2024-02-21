<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berkas_model extends Model
{
    protected $table         = "berkas";
    protected $primaryKey     = 'id_berkas';

    public function semua()
    {
        $query = DB::table('berkas')
             ->join('users', 'users.id_user', '=', 'berkas.id_user', 'LEFT')
            ->select('berkas.*', 'berkas.judul_link', 'berkas.isi')
            ->orderBy('berkas.id_berkas', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('berkas')
            ->join('users', 'users.id_user', '=', 'berkas.id_user', 'LEFT')
            ->select('berkas.*', 'berkas.judul_link','berkas.isi')
            ->orderBy('berkas.judul_link','ASC')
            ->paginate(20);
        return $query;
    }
    public function detail($id_berkas)
    {
        $query = DB::table('berkas')
            ->select('berkas.*', 'berkas.judul_link', 'berkas.isi')
            ->where('berkas.id_berkas', $id_berkas)
            ->orderBy('id_berkas', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('berkas')
            ->select('berkas.*', 'kategori_berkas.slug_kategori_berkas', 'kategori_berkas.nama_kategori_berkas')
            ->where('berkas.judul_link', 'LIKE', "%{$keywords}%")
            ->orWhere('berkas.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_berkas', 'DESC')
            ->get();
        return $query;
    }
    
   
}

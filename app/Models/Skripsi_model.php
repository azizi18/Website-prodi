<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Skripsi_model extends Model
{

    protected $table         = "skripsi";
    protected $primaryKey     = 'id_skripsi';

    // listing
    public function semua()
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(3);
        return $query;
    }

    // listing
    public function skripsi_update()
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->where('jenis_skripsi', 'skripsi')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(25);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('skripsi.id_user', $id_user)
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('skripsi.judul_skripsi', 'LIKE', "%{$keywords}%")
            ->orWhere('skripsi.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('skripsi.id_kategori'    => $id_kategori))
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori


    // kategori
    public function jenis_skripsi($jenis_skripsi)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('skripsi.jenis_skripsi'         => $jenis_skripsi))
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array(
                'skripsi.id_kategori'         => $id_kategori,
                'skripsi.jenis_skripsi'       => 'skripsi',

            ))
            ->orderBy('id_skripsi', 'DESC')
            ->paginate(12);
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('skripsi.jenis_skripsi' => 'skripsi '))
            ->orderBy('id_skripsi', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('skripsi')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('skripsi.jenis_skripsi' => 'skripsi'))
            ->orderBy('id_skripsi', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function related_post()
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('id_skripsi', '!=', $this->id_skripsi)
            ->inRandomOrder() // Ambil posting terkait secara acak
            ->take(3) // Ambil 3 posting terkait
            ->get();
        return $query;
    }
    // detail
    public function read($slug_skripsi)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('skripsi.slug_skripsi', $slug_skripsi)
            ->orderBy('id_skripsi', 'DESC')
            ->first();
        return $query;
    }
    public function status_skripsi($status_skripsi)
    {
        $query = DB::table('skripsi')
             ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user','LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'skripsi.status_skripsi'         => $status_skripsi))
            ->orderBy('id_skripsi','DESC')
            ->paginate(25);
        return $query;
    }
    // detail
    public function detail($id_skripsi)
    {
        $query = DB::table('skripsi')
            ->join('kategori', 'kategori.id_kategori', '=', 'skripsi.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'skripsi.id_user', 'LEFT')
            ->select('skripsi.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('skripsi.id_skripsi', $id_skripsi)
            ->orderBy('id_skripsi', 'DESC')
            ->first();
        return $query;
    }
}

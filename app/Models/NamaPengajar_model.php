<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NamaPengajar_model extends Model
{
    protected $table         = "nama_pengajar";
    protected $primaryKey     = 'id_pengajar';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
       
    ];



    public function semua()
    {
        $query = DB::table('nama_pengajar')
        ->join('users', 'users.id_user', '=', 'nama_pengajar.id_user', 'LEFT')
            ->select('nama_pengajar.*', 'nama_pengajar.nidn', 'nama_pengajar.nik_nip', 'nama_pengajar.nama')
            ->orderBy('nama_pengajar.id_pengajar', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('nama_pengajar')
            ->join('users', 'users.id_user', '=', 'nama_pengajar.id_user', 'LEFT')
            ->select('nama_pengajar.*', 'nama_pengajar.nidn', 'nama_pengajar.nik_nip', 'nama_pengajar.nama')
            ->orderBy('id_pengajar', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_pengajar)
    {
        $query = DB::table('nama_pengajar')
            ->join('users', 'users.id_user', '=', 'nama_pengajar.id_user', 'LEFT')
            ->select('nama_pengajar.*', 'nama_pengajar.nidn', 'nama_pengajar.nik_nip', 'nama_pengajar.nama')
            ->where('nama_pengajar.id_pengajar', $id_pengajar)
            ->orderBy('id_pengajar', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('nama_pengajar')
             ->join('users', 'users.id_user', '=', 'nama_pengajar.id_user', 'LEFT')
             ->select('nama_pengajar.*', 'nama_pengajar.nidn', 'nama_pengajar.nik_nip', 'nama_pengajar.nama')
             ->where('nama_pengajar.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_pengajar', 'DESC')
            ->get();
        return $query;
    }

    
}

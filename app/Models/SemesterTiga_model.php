<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterTiga_model extends Model
{
    protected $table         = "semester_tiga";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_tiga')
        ->join('users', 'users.id_user', '=', 'semester_tiga.id_user', 'LEFT')
            ->select('semester_tiga.*', 'semester_tiga.kode_mk', 'semester_tiga.nama_mk', 'semester_tiga.sks')
            ->orderBy('semester_tiga.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_tiga')
            ->join('users', 'users.id_user', '=', 'semester_tiga.id_user', 'LEFT')
            ->select('semester_tiga.*', 'semester_tiga.kode_mk', 'semester_tiga.nama_mk', 'semester_tiga.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_tiga')
            ->join('users', 'users.id_user', '=', 'semester_tiga.id_user', 'LEFT')
            ->select('semester_tiga.*', 'semester_tiga.kode_mk', 'semester_tiga.nama_mk', 'semester_tiga.sks')
            ->where('semester_tiga.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_tiga')
             ->join('users', 'users.id_user', '=', 'semester_tiga.id_user', 'LEFT')
             ->select('semester_tiga.*', 'semester_tiga.kode_mk', 'semester_tiga.nama_mk', 'semester_tiga.sks')
             ->where('semester_tiga.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

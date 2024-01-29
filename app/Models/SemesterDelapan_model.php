<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterDelapan_model extends Model
{
    protected $table         = "semester_delapan";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_delapan')
        ->join('users', 'users.id_user', '=', 'semester_delapan.id_user', 'LEFT')
            ->select('semester_delapan.*', 'semester_delapan.kode_mk', 'semester_delapan.nama_mk', 'semester_delapan.sks')
            ->orderBy('semester_delapan.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_delapan')
            ->join('users', 'users.id_user', '=', 'semester_delapan.id_user', 'LEFT')
            ->select('semester_delapan.*', 'semester_delapan.kode_mk', 'semester_delapan.nama_mk', 'semester_delapan.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_delapan')
            ->join('users', 'users.id_user', '=', 'semester_delapan.id_user', 'LEFT')
            ->select('semester_delapan.*', 'semester_delapan.kode_mk', 'semester_delapan.nama_mk', 'semester_delapan.sks')
            ->where('semester_delapan.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_delapan')
             ->join('users', 'users.id_user', '=', 'semester_delapan.id_user', 'LEFT')
             ->select('semester_delapan.*', 'semester_delapan.kode_mk', 'semester_delapan.nama_mk', 'semester_delapan.sks')
             ->where('semester_delapan.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

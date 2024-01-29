<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterEnam_model extends Model
{
    protected $table         = "semester_enam";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_enam')
        ->join('users', 'users.id_user', '=', 'semester_enam.id_user', 'LEFT')
            ->select('semester_enam.*', 'semester_enam.kode_mk', 'semester_enam.nama_mk', 'semester_enam.sks')
            ->orderBy('semester_enam.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_enam')
            ->join('users', 'users.id_user', '=', 'semester_enam.id_user', 'LEFT')
            ->select('semester_enam.*', 'semester_enam.kode_mk', 'semester_enam.nama_mk', 'semester_enam.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_enam')
            ->join('users', 'users.id_user', '=', 'semester_enam.id_user', 'LEFT')
            ->select('semester_enam.*', 'semester_enam.kode_mk', 'semester_enam.nama_mk', 'semester_enam.sks')
            ->where('semester_enam.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_enam')
             ->join('users', 'users.id_user', '=', 'semester_enam.id_user', 'LEFT')
             ->select('semester_enam.*', 'semester_enam.kode_mk', 'semester_enam.nama_mk', 'semester_enam.sks')
             ->where('semester_enam.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterDua_model extends Model
{
    protected $table         = "semester_dua";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_dua')
        ->join('users', 'users.id_user', '=', 'semester_dua.id_user', 'LEFT')
            ->select('semester_dua.*', 'semester_dua.kode_mk', 'semester_dua.nama_mk', 'semester_dua.sks')
            ->orderBy('semester_dua.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_dua')
            ->join('users', 'users.id_user', '=', 'semester_dua.id_user', 'LEFT')
            ->select('semester_dua.*', 'semester_dua.kode_mk', 'semester_dua.nama_mk', 'semester_dua.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_dua')
            ->join('users', 'users.id_user', '=', 'semester_dua.id_user', 'LEFT')
            ->select('semester_dua.*', 'semester_dua.kode_mk', 'semester_dua.nama_mk', 'semester_dua.sks')
            ->where('semester_dua.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_dua')
             ->join('users', 'users.id_user', '=', 'semester_dua.id_user', 'LEFT')
             ->select('semester_dua.*', 'semester_dua.kode_mk', 'semester_dua.nama_mk', 'semester_dua.sks')
             ->where('semester_dua.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

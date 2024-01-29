<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterSatu_model extends Model
{
    protected $table         = "semester_satu";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_satu')
        ->join('users', 'users.id_user', '=', 'semester_satu.id_user', 'LEFT')
            ->select('semester_satu.*', 'semester_satu.kode_mk', 'semester_satu.nama_mk', 'semester_satu.sks')
            ->orderBy('semester_satu.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_satu')
            ->join('users', 'users.id_user', '=', 'semester_satu.id_user', 'LEFT')
            ->select('semester_satu.*', 'semester_satu.kode_mk', 'semester_satu.nama_mk', 'semester_satu.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_satu')
            ->join('users', 'users.id_user', '=', 'semester_satu.id_user', 'LEFT')
            ->select('semester_satu.*', 'semester_satu.kode_mk', 'semester_satu.nama_mk', 'semester_satu.sks')
            ->where('semester_satu.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_satu')
             ->join('users', 'users.id_user', '=', 'semester_satu.id_user', 'LEFT')
             ->select('semester_satu.*', 'semester_satu.kode_mk', 'semester_satu.nama_mk', 'semester_satu.sks')
             ->where('semester_satu.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

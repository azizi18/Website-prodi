<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterTujuh_model extends Model
{
    protected $table         = "semester_tujuh";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_tujuh')
        ->join('users', 'users.id_user', '=', 'semester_tujuh.id_user', 'LEFT')
            ->select('semester_tujuh.*', 'semester_tujuh.kode_mk', 'semester_tujuh.nama_mk', 'semester_tujuh.sks')
            ->orderBy('semester_tujuh.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_tujuh')
            ->join('users', 'users.id_user', '=', 'semester_tujuh.id_user', 'LEFT')
            ->select('semester_tujuh.*', 'semester_tujuh.kode_mk', 'semester_tujuh.nama_mk', 'semester_tujuh.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_tujuh')
            ->join('users', 'users.id_user', '=', 'semester_tujuh.id_user', 'LEFT')
            ->select('semester_tujuh.*', 'semester_tujuh.kode_mk', 'semester_tujuh.nama_mk', 'semester_tujuh.sks')
            ->where('semester_tujuh.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_tujuh')
             ->join('users', 'users.id_user', '=', 'semester_tujuh.id_user', 'LEFT')
             ->select('semester_tujuh.*', 'semester_tujuh.kode_mk', 'semester_tujuh.nama_mk', 'semester_tujuh.sks')
             ->where('semester_tujuh.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

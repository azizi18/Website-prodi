<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterEmpat_model extends Model
{
    protected $table         = "semester_empat";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_empat')
        ->join('users', 'users.id_user', '=', 'semester_empat.id_user', 'LEFT')
            ->select('semester_empat.*', 'semester_empat.kode_mk', 'semester_empat.nama_mk', 'semester_empat.sks')
            ->orderBy('semester_empat.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_empat')
            ->join('users', 'users.id_user', '=', 'semester_empat.id_user', 'LEFT')
            ->select('semester_empat.*', 'semester_empat.kode_mk', 'semester_empat.nama_mk', 'semester_empat.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_empat')
            ->join('users', 'users.id_user', '=', 'semester_empat.id_user', 'LEFT')
            ->select('semester_empat.*', 'semester_empat.kode_mk', 'semester_empat.nama_mk', 'semester_empat.sks')
            ->where('semester_empat.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_empat')
             ->join('users', 'users.id_user', '=', 'semester_empat.id_user', 'LEFT')
             ->select('semester_empat.*', 'semester_empat.kode_mk', 'semester_empat.nama_mk', 'semester_empat.sks')
             ->where('semester_empat.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

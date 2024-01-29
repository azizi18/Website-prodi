<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SemesterLima_model extends Model
{
    protected $table         = "semester_lima";
    protected $primaryKey     = 'id_kurikulum';
    public $timestamps = false;

    protected $fillable = [
        
        'kode_mk',
        'nama_mk',
        'sks',
       
       
    ];



    public function semua()
    {
        $query = DB::table('semester_lima')
        ->join('users', 'users.id_user', '=', 'semester_lima.id_user', 'LEFT')
            ->select('semester_lima.*', 'semester_lima.kode_mk', 'semester_lima.nama_mk', 'semester_lima.sks')
            ->orderBy('semester_lima.id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('semester_lima')
            ->join('users', 'users.id_user', '=', 'semester_lima.id_user', 'LEFT')
            ->select('semester_lima.*', 'semester_lima.kode_mk', 'semester_lima.nama_mk', 'semester_lima.sks')
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }
    public function detail($id_kurikulum)
    {
        $query = DB::table('semester_lima')
            ->join('users', 'users.id_user', '=', 'semester_lima.id_user', 'LEFT')
            ->select('semester_lima.*', 'semester_lima.kode_mk', 'semester_lima.nama_mk', 'semester_lima.sks')
            ->where('semester_lima.id_kurikulum', $id_kurikulum)
            ->orderBy('id_kurikulum', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('semester_lima')
             ->join('users', 'users.id_user', '=', 'semester_lima.id_user', 'LEFT')
             ->select('semester_lima.*', 'semester_lima.kode_mk', 'semester_lima.nama_mk', 'semester_lima.sks')
             ->where('semester_lima.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_kurikulum', 'DESC')
            ->get();
        return $query;
    }

    
}

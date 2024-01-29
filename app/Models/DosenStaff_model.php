<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenStaff_model extends Model
{

    protected $table         = "dosen_staff";
    protected $primaryKey     = 'id_staff';

    // listing
    public function semua()
    {
        $query = DB::table('dosen_staff')
            ->select('dosen_staff.*')
            ->orderBy('dosen_staff.id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('dosen_staff')
            ->select('dosen_staff.*')
            ->where('dosen_staff.nama_staff', 'LIKE', "%{$keywords}%")
            ->orWhere('dosen_staff.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('dosen_staff')
            ->join('users', 'users.id_user', '=', 'dosen_staff.id_user', 'LEFT')
            ->select('dosen_staff.*', 'dosen_staff.slug_staff ', 'dosen_staff.nama_staff ')
            ->where(array('dosen_staff.status_staff' => 'dosen_staff'))
            ->orderBy('id_staff', 'DESC')
            ->paginate(12);
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('dosen_staff')
            ->join('users', 'users.id_user', '=', 'dosen_staff.id_user', 'LEFT')
            ->select('dosen_staff.*')
            ->orderBy('dosen_staff.urutan', 'ASC')
            ->limit(15)
            ->get();
        return $query;
    }

    

    // kategori
    public function status_staff($status_staff)
    {
        $query = DB::table('dosen_staff')
            ->select('dosen_staff.*')
            ->where(array('dosen_staff.status_staff'         => $status_staff))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    
    // detail
    public function detail($id_staff)
    {
        $query = DB::table('dosen_staff')
            ->select('dosen_staff.*')
            ->where('dosen_staff.id_staff', $id_staff)
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }

    
}

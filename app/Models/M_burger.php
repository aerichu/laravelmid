
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class M_projek2 extends Model
{
    public function tampil($tabel, $id)
    {
        return DB::table($tabel)
                    ->orderBy($id, 'desc')
                    ->get();
    }

    public function join($tabel, $tabel2, $on, $id)
    {
        return DB::table($tabel)
                    ->leftJoin($tabel2, $on)
                    ->orderBy($id, 'desc')
                    ->get();
    }

    public function tampiltugas($tabel, $id)
    {
        return DB::table($tabel)
                    ->where('isdelete', 0)
                    ->orderBy($id, 'desc')
                    ->get()
                    ->toArray(); // Mengembalikan array asosiatif
    }

    public function getBackupUser($id_user)
    {
        return DB::table('backup_user')
                    ->where('id_user', $id_user)
                    ->first();
    }

    public function getBackupKelas($id_kelas)
    {
        return DB::table('backup_kelas')
                    ->where('id_kelas', $id_kelas)
                    ->first();
    }

    public function getBackupTugas($id_tugas)
    {
        return DB::table('backup_tugas')
                    ->where('id_tugas', $id_tugas)
                    ->first();
    }

    public function joinkondisi($tabel, $tabel2, $on, $id, $where = [])
{
    $query = \DB::table($tabel)
                ->join($tabel2, function ($join) use ($on) {
                    // Split the on condition to get the column names
                    list($left, $right) = explode('=', $on);
                    $join->on(trim($left), '=', trim($right));
                })
                ->orderBy($id, 'desc');

    // If there are where conditions, add them to the query
    if (!empty($where)) {
        $query->where($where);
    }

    return $query->get();
}



    public function joinkondisi3($tabel, $tabel2, $tabel3, $on, $on2, $id, $where = [])
    {
        $query = DB::table($tabel)
                    ->leftJoin($tabel2, $on)
                    ->leftJoin($tabel3, $on2)
                    ->orderBy($id, 'desc');

        if (!empty($where)) {
            $query->where($where);
        }

        return $query->get();
    }
    

    public function tambah($tabel, $isi)
    {
        return DB::table($tabel)
                    ->insert($isi);
    }

    public function edit($tabel, $isi, $where)
    {
        return DB::table($tabel)
                    ->where($where)
                    ->update($isi);
    }

    public function hapus($tabel, $where)
    {
        return DB::table($tabel)
                    ->where($where)
                    ->delete();
    }
}

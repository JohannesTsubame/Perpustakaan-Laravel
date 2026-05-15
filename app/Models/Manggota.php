<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manggota extends Model
{
    protected $table = "anggota";
    protected $fillable = ["kode_anggota",
                           "nama",
                           "alamat",
                           "no_hp",
                           "email",
                           "tanggal_daftar",
                           "status"];

    public function peminjaman() {
        $fk = "angggota_id";
        $pk = "id";

        return $this->hasMany(Mpeminjaman::class, $fk, $pk);
    }
}

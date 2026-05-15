<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpeminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable = ["anggota_id",
                           "pengguna_id",
                           "tangga_pinjam",
                           "tanggal_kembali",
                           "status"];
}

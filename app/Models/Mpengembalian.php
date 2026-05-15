<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpengembalian extends Model
{
    protected $table = "pengembalian";
    protected $fillable = ["peminjaman_id",
                           "tanggal_dikembalikan",
                           "denda",
                           "kondisi_buku"];
}

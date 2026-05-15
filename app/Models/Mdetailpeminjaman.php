<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mdetailpeminjaman extends Model
{
    protected $table = "detailpeminjaman";
    protected $fillable = ["peminjaman_id",
                           "buku_id",
                           "jumlah"];
}

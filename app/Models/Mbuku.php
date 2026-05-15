<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mbuku extends Model
{
    protected $table = "buku";
    protected $fillable = ["kode_buku",
                           "judul",
                           "penulis", 
                           "penerbit",
                           "tahun_terbit",
                           "isbn",
                           "jumlah_total",
                           "jumlah_tersedia",
                           "kategori_id"]; 

    public function detail_peminjaman() {
        $fk = "buku_id";
        $pk = "id";

        return $this->hasMany(Mdetailpeminjaman::class, $fk, $pk);
    }
}

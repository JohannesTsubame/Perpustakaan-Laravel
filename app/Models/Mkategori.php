<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mkategori extends Model
{
    protected $table ="kategori";
    protected $fillable = ["nama_kategori", "deskripsi"];
}

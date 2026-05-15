<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpengguna extends Model
{
    protected $table = "pengguna";
    protected $fillable = ["nama", "email", "password", "peran"];
}

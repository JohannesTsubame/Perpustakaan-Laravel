<?php

namespace App\Http\Controllers;

use App\Models\Mbuku;
use App\Models\Mkategori;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Capi5 extends Controller
{
     public function index(Request $request){
        $apiKey = $request->header('X-API-KEY');
        $validApiKey = '123456';

        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }                                                                                             
        $data = DB::table("buku")
        ->leftJoin("kategori", "buku.kategori_id", "=", "kategori.id")
        ->select("buku.*", "kategori.nama_kategori as nama_kategori", "kategori.deskripsi as deskripsi")
        ->orderBy("kode_buku")
        ->get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function add() {
        return response()->json(Mkategori::all());
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "kode_buku" => "required|unique:buku,kode_buku",
            "judul" => "required",
            "penulis" => "required",
            "penerbit" => "required",
            "tahun_terbit" => "required",
            "isbn" => "required",
            "jumlah_total" => "required",
            "jumlah_tersedia" => "required",
            "kategori_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message'  => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422, [], JSON_PRETTY_PRINT);
        }

        $data = Mbuku::create($request->all());
        return response()->json([
            'status'  => 'success',
            'message'  => 'Data succesfully added',
            'data'  => $data
        ], 201, [], JSON_PRETTY_PRINT);
    }
}

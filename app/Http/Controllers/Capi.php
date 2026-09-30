<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mbuku;
use Illuminate\Support\Facades\DB;

class Capi extends Controller
{
    public function buku1() {
        $data = Mbuku::get();
        return response()->json([
            'status' => 'success',
            'message' => 'Item list succesfullly retrieved',
            'data'    => $data,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function buku2()
    {
        $data = Mbuku::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function buku3(Request $request) {
        $token = $request->query('token');
        $validToken = '123456';

        if (!$token || $token !== $validToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $data = Mbuku::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function buku4(Request $request) {
        $token = $request->bearerToken();
        $validToken = '123456';

        if (!$token || $token !== $validToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $data = Mbuku::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function buku5(Request $request){
        $apiKey = $request->header('X-API-KEY');
        $validApiKey = '123456';

        if (!$apiKey || $apiKey !== $validApiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key invalid or not found'
            ], 401, [], JSON_PRETTY_PRINT);
        }

        // $data = Mbuku::get();
        $data = DB::table("buku")
        ->leftJoin("kategori", "buku.kategori_id", "=", "kategori.id")
        ->select("buku.*", "kategori.nama_kategori as nama_kategori", "kategori.deskripsi as deskripsi")
        ->orderBy("kode_buku")
        ->get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function buku_by_id(string $id_buku) {
        $data = Mbuku::where('id_buku', $id_buku)->first();
        if (!$data) {
            return response()->json([
                'message' => 'No item find with that id'
            ], 404, [], JSON_PRETTY_PRINT);
        }
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

}

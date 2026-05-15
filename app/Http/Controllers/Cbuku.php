<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mbuku;
use App\Models\Mkategori;
use Illuminate\Support\Facades\DB;

class Cbuku extends Controller
{
    public function index() {
        $buku = DB::table("buku")
        ->leftJoin("kategori", "buku.kategori_id", "=", "kategori.id")
        ->select("buku.*", "kategori.nama_kategori as nama_kategori", "kategori.deskripsi as deskripsi")
        ->orderBy("kode_buku")
        ->get();

        return view("buku.index", compact("buku"));
    }

    public function add() {
        $kategori = DB::table("kategori")->get();
        return view("buku.add", compact("kategori"));
    }

    public function save(Request $request) {
        $buku = new Mbuku();
        $buku->kode_buku = $request->kode_buku;
        $buku->judul  = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->isbn = $request->isbn;
        $buku->jumlah_total = $request->jumlah_total;
        $buku->jumlah_tersedia = $request->jumlah_tersedia;
        $buku->kategori_id = $request->kategori_id;
        $buku->save();

        return redirect()->route("buku.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function edit(int $id) {
        $buku = Mbuku::where("id", $id)->first();
        $kategori = DB::table("kategori")->get();

        return view("buku.edit", compact("buku", "kategori"));
    }

    public function update(Request $request, int $id) {
        $buku = Mbuku::where("id", $id)->first();

        if ($buku) {
            $buku->kode_buku = $request->kode_buku;
            $buku->judul  = $request->judul;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->isbn = $request->isbn;
            $buku->jumlah_total = $request->jumlah_total;
            $buku->jumlah_tersedia = $request->jumlah_tersedia;
            $buku->kategori_id = $request->kategori_id;

            $buku->save();
        }

        return redirect()->route("buku.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function delete(int $id) {
        $buku = Mbuku::where("id", $id)->first();
        $buku->delete();

        return redirect()->route("buku.index")->with("Sukses", "Berhasil Dihapus");
    }
}

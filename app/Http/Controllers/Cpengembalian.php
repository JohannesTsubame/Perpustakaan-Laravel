<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpengembalian;
use App\Models\Mpeminjaman;
use Illuminate\Support\Facades\DB;

class Cpengembalian extends Controller
{
    public function index() {
        $pengembalian = DB::table("pengembalian")
        ->leftJoin("peminjaman", "pengembalian.peminjaman_id", "=", "peminjaman.id")
        ->select(
            "pengembalian.*", 
            "peminjaman")
        ->get();
    }

    public function add() {
        $peminjaman = Mpeminjaman::all();
        return view("pengembalian.add", compact("peminjaman"));
    }

    public function save(Request $request) {
        $pengembalian = new Mpengembalian();

        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->tanggal_dikembalikan  = $request->tanggal_dikembalikan;
        $pengembalian->denda = $request->denda;
        $pengembalian->kondisi_buku = $request->kondisi_buku;
        $pengembalian->save();

        return redirect()->route("pengembalian.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function edit($id) {
        $pengembalian = Mpengembalian::FindOrFail($id);
        $peminjaman = Mpeminjaman::all();
        return view("pengembalian.edit", compact("pengembalian", "peminjaman"));
    }

    public function update(Request $request, $id) {
        $pengembalian = Mpengembalian::FindOrFail($id);

        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->tanggal_dikembalikan  = $request->tanggal_dikembalikan;
        $pengembalian->denda = $request->denda;
        $pengembalian->kondisi_buku = $request->kondisi_buku;
        
        $pengembalian->save();

        return redirect()->route("pengembalian.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function delete($id) {
        $pengembalian = Mpengembalian::FindOrFail($id);
        $pengembalian->delete();

        return redirect()->route("pengembalian.index")->with("Sukses", "Berhasil Dihapus");
    }
}

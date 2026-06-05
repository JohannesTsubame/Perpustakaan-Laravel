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
            "peminjaman.id as peminjaman_id",
            "peminjaman.tanggal_kembali as tanggal_dikembalikan")
        ->get();

        return view("pengembalian.index", compact("pengembalian"));
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

        return redirect()->route("pengembalian.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $pengembalian = Mpengembalian::FindOrFail($id);
        $peminjaman = Mpeminjaman::all();
        return view("pengembalian.edit", compact("pengembalian", "peminjaman"));
    }

    public function update(Request $request, $id) {
        // return dd();

        $pengembalian = Mpengembalian::FindOrFail($id);

        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->tanggal_dikembalikan  = $request->tanggal_dikembalikan;
        $pengembalian->denda = $request->denda;
        $pengembalian->kondisi_buku = $request->kondisi_buku;
        
        $pengembalian->save();

        return redirect()->route("pengembalian.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $pengembalian = Mpengembalian::FindOrFail($id);
        $pengembalian->delete();

        return redirect()->route("pengembalian.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $pengembalian = DB::table("pengembalian")
        ->select("pengembalian.*")
        ->orderBy("id_pengembalian")
        ->get();

        return view("pengembalian.print_data", compact("pengembalian"));
    }

    public function export() {
        
        $pengembalian = DB::table("pengembalian")
        ->select("pengembalian.*")
        ->orderBy("id_pengembalian")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=pengembalian_310124023844_JonathanAndrewWijaya.xlsx");

        return view('pengembalian.export', compact('pengembalian'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpeminjaman;
use Illuminate\Support\Facades\DB;

class Cpeminjaman extends Controller
{
    public function index() {
        $peminjaman = DB::table("peminjaman")
        ->leftJoin("pengguna", "peminjaman.pengguna_id", "=", "pengguna.id")
        ->leftJoin("anggota", "peminjaman.anggota_id", "=", "anggota.id")
        ->select(
            "peminjaman.*",
            "pengguna.nama as nama_pengguna",
            "pengguna.peran",
            "anggota.nama as nama_anggota",
            // "anggota.status"
        )
        ->get();

        return view("peminjaman.index", compact("peminjaman"));
    }

    public function add() {
        $pengguna = DB::table("pengguna")->get();
        $anggota = DB::table("anggota")->get();
        return view("peminjaman.add", compact("anggota", "pengguna"));
    }

    public function save(Request $request) {    
        $peminjaman = new Mpeminjaman();

        $peminjaman->anggota_id = $request->anggota_id;
        $peminjaman->pengguna_id  = $request->pengguna_id;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route("peminjaman.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $peminjaman = Mpeminjaman::FindOrFail($id);
        $pengguna = DB::table("pengguna")->get();
        $anggota = DB::table("anggota")->get();

        return view("peminjaman.edit", compact("peminjaman", "anggota", "pengguna"));
    }

    public function update(Request $request, $id) {
        $peminjaman = Mpeminjaman::FindOrFail($id);

        $peminjaman->anggota_id = $request->anggota_id;
        $peminjaman->pengguna_id  = $request->pengguna_id;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status = $request->status; 
        $peminjaman->save();

        return redirect()->route("peminjaman.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $peminjaman = Mpeminjaman::FindOrFail($id);
        $peminjaman->delete();

        return redirect()->route("peminjaman.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $peminjaman = DB::table("peminjaman")
        ->leftJoin("pengguna", "peminjaman.pengguna_id", "=", "pengguna.id")
        ->leftJoin("anggota", "peminjaman.anggota_id", "=", "anggota.id")
        ->select(
            "peminjaman.*",
            "pengguna.nama as nama_pengguna",
            "pengguna.peran",
            "anggota.nama as nama_anggota",
            // "anggota.status"
        )
        ->get();

        return view("peminjaman.print_data", compact("peminjaman"));
    }

    public function export() {
        
        $peminjaman = DB::table("peminjaman")
        ->leftJoin("pengguna", "peminjaman.pengguna_id", "=", "pengguna.id")
        ->leftJoin("anggota", "peminjaman.anggota_id", "=", "anggota.id")
        ->select(
            "peminjaman.*",
            "pengguna.nama as nama_pengguna",
            "pengguna.peran",
            "anggota.nama as nama_anggota",
            // "anggota.status"
        )
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=peminjaman_310124023844_JonathanAndrewWijaya.xlsx");

        return view('peminjaman.export', compact('peminjaman'));
    }
}

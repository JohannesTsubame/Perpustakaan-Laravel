<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Manggota;

class Canggota extends Controller
{
    public function index() {
        $anggota = Manggota::all();

        return view("anggota.index", compact("anggota"));
    }

    public function add() {
        return view("anggota.add");
    }

    public function save(Request $request) {
        $anggota = new Manggota();

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama  = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->tanggal_daftar = $request->tanggal_daftar;
        $anggota->status = $request->status;
        $anggota->save();

        return redirect()->route("anggota.index")->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    public function edit($id) {
        $anggota = Manggota::FindOrFail($id);

        return view("anggota.edit", compact("anggota"));
    }

    public function update(Request $request, $id) {
        $anggota = Manggota::FindOrFail($id);

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama  = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->tanggal_daftar = $request->tanggal_daftar;
        $anggota->status = $request->status;
        $anggota->save();

        return redirect()->route("anggota.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function delete($id) {
        $anggota = Manggota::FindOrFail($id);
        $anggota->delete();

        return redirect()->route("anggota.index")->with("Sukses", "Berhasil Dihapus");
    }
}

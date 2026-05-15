<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mdetailpeminjaman;

class Cdetailpeminjaman extends Controller
{
    public function index() {
        $detail_peminjaman = Mdetailpeminjaman::all();

        return view("detail_peminjaman.index", compact("detail_peminjaman"));
    }

    public function add() {
        return view("detail_peminjaman.add");
    }

    public function save(Request $request) {
        $detail_peminjaman = new Mdetailpeminjaman();

        $detail_peminjaman->peminjaman_id = $request->peminjaman_id;
        $detail_peminjaman->buku_id  = $request->buku_id;
        $detail_peminjaman->jumlah = $request->jumlah;
        $detail_peminjaman->save();

        return redirect()->route("detail_peminjaman.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function edit($id) {
        $detail_peminjaman = Mdetailpeminjaman::FindOrFail($id);

        return view("detail_peminjaman.edit", compact("detail_peminjaman"));
    }

    public function update(Request $request, $id) {
        $detail_peminjaman = Mdetailpeminjaman::FindOrFail($id);

        $detail_peminjaman->peminjaman_id = $request->peminjaman_id;
        $detail_peminjaman->buku_id  = $request->buku_id;
        $detail_peminjaman->jumlah = $request->jumlah;
        $detail_peminjaman->save();

        return redirect()->route("detail_peminjaman.index")->with("Sukses", "Berhasil Disimpan");
    }

    public function delete($id) {
        $detail_peminjaman = Mdetailpeminjaman::FindOrFail($id);
        $detail_peminjaman->delete();

        return redirect()->route("detail_peminjaman.index")->with("Sukses", "Berhasil Dihapus");
    }
}

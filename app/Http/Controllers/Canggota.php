<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Manggota;

class Canggota extends Controller
{
    public function index() {
        $anggota = DB::table("anggota")
        ->select("anggota.*")
        ->orderBy("kode_anggota")
        ->get();

        return view("anggota.index", compact("anggota"));
    }

    public function add() {
        return view("anggota.add");
    }

    public function save(Request $request) {
        $anggota = new Manggota();

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/anggota_pic"), $filename);
        }

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama  = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->tanggal_daftar = $request->tanggal_daftar;
        $anggota->status = $request->status;
        $anggota->pic = $filename;
        $anggota->save();

        return redirect()->route("anggota.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $anggota = Manggota::FindOrFail($id);

        return view("anggota.edit", compact("anggota"));
    }

    public function update(Request $request, $id) {
        $anggota = Manggota::FindOrFail($id);

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/anggota_pic"), $filename);
        }

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama  = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->tanggal_daftar = $request->tanggal_daftar;
        $anggota->status = $request->status;
        $anggota->pic = $filename;
        $anggota->save();

        return redirect()->route("anggota.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $anggota = Manggota::FindOrFail($id);
        $anggota->delete();

        return redirect()->route("anggota.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $anggota = DB::table("anggota")
        ->select("anggota.*")
        ->orderBy("kode_anggota")
        ->get();

        return view("anggota.print_data", compact("anggota"));
    }

    public function export() {
        
        $anggota = DB::table("anggota")
        ->select("anggota.*")
        ->orderBy("kode_anggota")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=anggota_310124023844_JonathanAndrewWijaya.xlsx");

        return view('anggota.export', compact('anggota'));
    }
}

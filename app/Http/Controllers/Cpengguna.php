<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpengguna;

use Illuminate\Support\Facades\DB;

class Cpengguna extends Controller
{
    public function index() {
        $pengguna = Mpengguna::all();

        return view("pengguna.index", compact("pengguna"));
    }

    public function add() {
        return view("pengguna.add");
    }

    public function save(Request $request) {
        $pengguna = new Mpengguna();

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/pengguna_pic"), $filename);
        }

        $pengguna->nama  = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->peran = $request->peran;
        $pengguna->pic = $filename;
        $pengguna->save();

        return redirect()->route("pengguna.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $pengguna = Mpengguna::FindOrFail($id);

        return view("pengguna.edit", compact("pengguna"));
    }

    public function update(Request $request, $id) {
        $pengguna = Mpengguna::FindOrFail($id);

        $pic = $request->file("pic");
        $filename = null;
        if ($pic) {
            $extension = $pic->getClientOriginalExtension();
            $filename = date("YmdHis") . "." . $extension;
            $pic->move(public_path("uploads/pengguna_pic"), $filename);
        }

        $pengguna->nama  = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->peran = $request->peran;
        $pengguna->pic = $filename;
        $pengguna->save();

        return redirect()->route("pengguna.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $pengguna = Mpengguna::FindOrFail($id);
        $pengguna->delete();

        return redirect()->route("pengguna.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $pengguna = DB::table("pengguna")
        ->select("pengguna.*")
        ->get();

        return view("pengguna.print_data", compact("pengguna"));
    }

    public function export() {
        
        $pengguna = DB::table("pengguna")
        ->select("pengguna.*")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=pengguna_310124023844_JonathanAndrewWijaya.xlsx");

        return view('pengguna.export', compact('pengguna'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpengguna;

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

        $pengguna->nama  = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->peran = $request->peran;
        $pengguna->save();

        return redirect()->route("pengguna.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $pengguna = Mpengguna::FindOrFail($id);

        return view("pengguna.edit", compact("pengguna"));
    }

    public function update(Request $request, $id) {
        $pengguna = Mpengguna::FindOrFail($id);

        $pengguna->nama  = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->peran = $request->peran;
        $pengguna->save();

        return redirect()->route("pengguna.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $pengguna = Mpengguna::FindOrFail($id);
        $pengguna->delete();

        return redirect()->route("pengguna.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mkategori;

use Illuminate\Support\Facades\DB;

class Ckategori extends Controller
{
     public function index() {
        $kategori = Mkategori::all();

        return view("kategori.index", compact("kategori"));
    }

    public function add() {
        return view("kategori.add");
    }

    public function save(Request $request) {
        $request->validate([
        'nama_kategori' => 'required',
        'deskripsi' => 'required'
        ]);

        $kategori = new Mkategori();

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi  = $request->deskripsi;
        $kategori->save();

        return redirect()->route("kategori.index")->with('save', ['judul' => 'Success', 'pesan' => 'Data is Succesfully Saved', 'icon' => 'success']);
    }

    public function edit($id) {
        $kategori = Mkategori::FindOrFail($id);

        return view("kategori.edit", compact("kategori"));
    }

    public function update(Request $request, $id) {
        $kategori = Mkategori::FindOrFail($id);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi  = $request->deskripsi;
        $kategori->save();

        return redirect()->route("kategori.index")->with('update', ['judul' => 'Success', 'pesan' => 'Data Successfully Updated', 'icon' => 'success']);
    }

    public function delete($id) {
        $kategori = Mkategori::FindOrFail($id);
        $kategori->delete();

        return redirect()->route("kategori.index")->with('delete', ['judul' => 'Success', 'pesan' => 'Data Successfully Deleted', 'icon' => 'success']);
    }

    public function print_data() {
        $kategori = DB::table("kategori")
        ->select("kategori.*")
        ->get();

        return view("kategori.print_data", compact("kategori"));
    }

    public function export() {
        
        $kategori = DB::table("kategori")
        ->select("kategori.*")
        ->get();

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=kategori_310124023844_JonathanAndrewWijaya.xlsx");

        return view('kategori.export', compact('kategori'));
    }
}

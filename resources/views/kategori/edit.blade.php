@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('kategori.update', $kategori->id)}}" method="POST">
    @csrf
    @method("PUT")

    <a href="{{route('kategori.index')}}">Kembali</a>
    <br>

    Nama Kategori :
    <input type="text" name="nama_kategori" value="{{old('nama_kategori', $kategori->nama_kategori)}}" required>
    <br>

    Deskripsi :
    <input type="text" name="deskripsi" value="{{old('deskripsi', $kategori->deskripsi)}}" required>
    <br>

    <button type="submit">Save Data</button>
</form>

@endsection
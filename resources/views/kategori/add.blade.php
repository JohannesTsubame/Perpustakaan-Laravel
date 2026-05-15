@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('kategori.save')}}" method="POST">
    @csrf

    <a href="{{route('kategori.index')}}">Kembali</a>
    <br>

    Nama Kategori :
    <input type="text" name="nama_kategori" required>
    <br>

    Deskripsi :
    <input type="text" name="deskripsi" required>
    <br>

    <button type="submit">Save Data</button>
</form>

@endsection
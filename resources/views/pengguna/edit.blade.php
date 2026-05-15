@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('pengguna.update', $pengguna->id)}}" method="POST">
    @csrf
    @method("PUT")

    <a href="{{route('pengguna.index')}}">Kembali</a>
    <br>

    Nama :
    <input type="text" name="nama" value="{{old('nama', $pengguna->nama)}}" required>
    <br>

    Email :
    <input type="email" name="email" value="{{old('email', $pengguna->email)}}" required>
    <br>

    Password :
    <input type="text" name="password" value="{{old('password', $pengguna->password)}}" required>
    <br>
    
    Peran :
    <select name="peran">
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
    </select>

    <button type="submit">Save Data</button>
</form>

@endsection
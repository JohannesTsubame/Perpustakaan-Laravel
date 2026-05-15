@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('pengguna.save')}}" method="POST">
    @csrf

    <a href="{{route('pengguna.index')}}">Kembali</a>
    <br>

    Nama :
    <input type="text" name="nama" required>
    <br>

    Email :
    <input type="email" name="email" required>
    <br>

    Password :
    <input type="text" name="password" reuired>
    <br>
    
    Peran :
    <select name="peran">
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
    </select>

    <button type="submit">Save Data</button>
</form>

@endsection
@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('peminjaman.save')}}" method="POST">
    @csrf

    <a href="{{route('peminjaman.index')}}">Kembali</a>
    <br>

    <h2>Anggota ID :</h2>
    @if (empty($anggota->id) == False)
        Anggota Tidak Ada, <a href="{{route('anggota.add')}}">Tambahkan Anggota.</a>
    @else
        <select name="anggota_id">
            @foreach ($anggota as $p)
                <option value="{{ $p->id }}">{{ $p->id }} ({{$p->nama}})</option>
            @endforeach
        </select>
    @endif
    <br>

    <h2>Pengguna ID :</h2>
    @if (empty($pengguna->id) == False)
        Pengguna Tidak Ada, <a href="{{route('pengguna.add')}}">Tambahkan Pengguna.</a>
    @else
        <select name="pengguna_id">
            @foreach ($pengguna as $p)
                <option value="{{ $p->id }}">{{ $p->id }} ({{$p->nama}})</option>
            @endforeach
        </select>
    @endif
    <br>

    <h2>Tanggal Pinjam :</h2>
    <input type="date" name="tanggal_pinjam" required>
    <br>

    <h2>Tanggal Kembali :</h2>
    <input type="date" name="tanggal_kembali" required>
    <br>

    <h2>Status :</h2> 
    <select name="status">
        <option value="dipinjam">Dipinjam</option>
        <option value="kembali">Kembali</option>
    </select>
    <br>
    
    @if (empty($peminjaman->id) == False)
        peminjaman Tidak Ada, <a href="{{route('peminjaman.add')}}">Tambahkan peminjaman.</a>
    @elseif (empty($pengguna->id) == False)
        Pengguna Tidak Ada, <a href="{{route('pengguna.add')}}">Tambahkan Pengguna.</a>
    @else
        <button type="submit">Save Data</button>
    @endif
</form>

@endsection
@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<form action="{{route('pengembalian.save')}}" method="POST">
    @csrf

    <a href="{{route('pengembalian.index')}}">Kembali</a>
    <br>

    Peminjaman ID :
    <select name="peminjaman_id">
        @foreach($peminjaman as $p)
            <option value = "{{$p->id}}">{{$p->id}}</option>
        @endforeach
    </select>
    <br>

    Tanggal Dikembalikan :
    <input type="date" name="tanggal_dikembalikan" required>
    <br>    

    Denda :
    <input type="number" name="denda" required>
    <br>

    Kondisi Buku :
    <select name="kondisi_buku">
        <option value="baik">Baik</option>
        <option value="rusak">Rusak</option>
        <option value="hilang">Hilang</option>
    </select>

    <button type="submit">Save Data</button>
</form>

@endsection
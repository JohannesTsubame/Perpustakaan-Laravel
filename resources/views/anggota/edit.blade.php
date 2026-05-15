@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    input, textarea, select{width: 100%}

    form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body div, .card-body button{
        margin-top: 2%;
    }
</style>

@extends('layout.menu')
@section("contents")

<form action="{{route('anggota.update', $anggota->id)}}" method="POST">
    @csrf
    @method("PUT")
    <div class="card" style="width:50%;">
        <div class="card-body" style="font-size: 20px">
            <a href="{{route('anggota.index')}}">Kembali</a>
            <br>

            Kode Anggota :
            <input type="text" name="kode_anggota" value={{old("kode_anggota", $anggota->kode_anggota)}} readonly required>
            <br>

            Nama :
            <input type="text" name="nama" value={{old("nama", $anggota->nama)}} required>
            <br>

            Alamat :
            <input type="text" name="alamat" value={{old("alamat", $anggota->alamat)}} required>
            <br>

            No. HP :
            <input type="text" name="no_hp" value={{old("no_hp", $anggota->no_hp)}} required>
            <br>

            Email : 
            <input type="email" name="email" value={{old("email", $anggota->email)}} required>
            <br>

            Tanggal Daftar :
            <input type="date" name="tanggal_daftar" value={{old("tanggal_daftar", $anggota->tanggal_daftar)}} required>
            <br>

            Status :
            <select name="status" required>
                    <option value="aktif">aktif</option>
                    <option value="nonaktif">nonaktif</option>
            </select>
            <br>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">Save Data</button>
</form>

@endsection
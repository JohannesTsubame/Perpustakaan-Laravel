@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    input, textarea{width: 100%}

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

<form action="{{route('anggota.save')}}" method="POST">
    @csrf
    <div class="card" style="width:50%;">
        <div class="card-body">

            <a href="{{route('anggota.index')}}">Kembali</a>
            </br>

            <div class="form-group" style="font-size: 20px">
                <h3>Kode Anggota :</h3>
                <input type="text" name="kode_anggota" required>
            </div>

            <div class="form-group" style="font-size: 20px">
                <h3>Nama :</h3>
                <input type="text" name="nama" required>
            </div>
            
            <div class="form-group" style="font-size: 20px">
                <h3>Alamat :</h3>
                <textarea name="alamat" required></textarea>
            </div>
            
            <div class="form-group" style="font-size: 20px">
                <h3>No. HP :</h3>
                <input type="text" name="no_hp" required>
            </div>
            
            <div class="form-group" style="font-size: 20px">
                <h3>Email :</h3> 
                <input type="email" name="email" required>
            </div>

            <div class="form-group" style="font-size: 20px">
                <h3>Tanggal Daftar :</h3>
                <input type="date" name="tanggal_daftar" required>
            </div>

            <div class="form-group" style="font-size: 20px">
                <h3>Status :</h3>
                <select style ="font-size: 20px" name="status" class="form-control" required>
                    <option value="aktif">aktif</option>
                    <option value="nonaktif">nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">Save Data</button>
        </div>
    </div>
</form>

@endsection
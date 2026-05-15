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

<form action="{{route('buku.save')}}" method="POST">
    @csrf
    <div class="card" style="width:50%;">
        <div class="card-body" style="font-size: 20px">
    
            <a href="{{route('buku.index')}}">Kembali</a>
            <br>

            <h2>Kode Buku :</h2>
            <input type="text" name="kode_buku" required>
            <br>

            <h2>Judul :</h2>
            <input type="text" name="judul" required>
            <br>

            <h2>Penulis :</h2>
            <input type="text" name="penulis" required>
            <br>

            <h2>Penerbit :</h2>
            <input type="text" name="penerbit" required>
            <br>

            <h2>Kategori:</h2>
            <select name="kategori_id" required>
                <option value="">--Select--</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id}}">
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
            <br>

            <h2>Tahun Terbit :</h2> 
            <input type="number" min="1901" max="2099" step="1" value="2026" name="tahun_terbit" required>
            <br>

            <h2>ISBN :</h2>
            <input type="text" name="isbn" required>
            <br>

            <h2>Jumlah Total :</h2>
            <input type="number" name="jumlah_total" required>
            <br>

            <h2>Jumlah Tersedia :</h2>
            <input type="number" name="jumlah_tersedia" required>
            <br>

            <button type="submit" class="btn btn-primary" style="width:100%">Save Data</button>
        </div>
    </div>
</form>

@endsection
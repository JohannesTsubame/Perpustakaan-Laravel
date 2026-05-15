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

<form action="{{route('buku.update', $buku->id)}}" method="POST">
    @csrf
    @method("PUT")

    <div class="card" style="width:50%;">
        <div class="card-body" style="font-size: 20px">
        <a href="{{route('buku.index')}}">Kembali</a>
        <br>

        <h2>Kode Buku :</h2>
        <input type="text" name="kode_buku" value="{{old('kode_buku', $buku->kode_buku)}}" required>
        <br>

        <h2>Judul :</h2>
        <input type="text" name="judul" value="{{old('judul', $buku->judul)}}" required>
        <br>

        <h2>Penulis :</h2>
        <input type="text" name="penulis" value="{{old('penulis', $buku->penulis)}}" required>
        <br>

        <h2>Penerbit :</h2>
        <input type="text" name="penerbit" value="{{old('penerbit', $buku->penerbit)}}" required>
        <br>

        <h2>Kategori</h2>
        <select name="kategori_id">
            <option value="">- - SELECT - -</option>
            @foreach ($kategori as $k)
                <option value="{{$k->id}}" {{old('id', $k->id) == $buku->kategori_id ? 'selected' : ''}}>
                    {{$k->nama_kategori}}
                </option>
            @endforeach
        </select>

        <br>

        <h2>Tahun Terbit : </h2>
        <input type="number" min="1901" max="2099" step="1" value="2026" name="tahun_terbit" value="{{old('tahun_terbit', $buku->tahun_terbit)}}" required>
        <br>

        <h2>ISBN :</h2>
        <input type="text" name="isbn" value="{{old('isbn', $buku->isbn)}}" required>
        <br>

        <h2>Jumlah Total :</h2>
        <input type="number" name="jumlah_total" value="{{old('jumlah_total', $buku->jumlah_total)}}" required>
        <br>

        <h2>Jumlah Tersedia :</h2>
        <input type="number" name="jumlah_tersedia"value="{{old('jumlah_tersedia', $buku->jumlah_tersedia)}}" required>
        <br>

    <button type="submit" class="btn btn-primary" style="width:100%">Save Data</button>
</form>

@endsection
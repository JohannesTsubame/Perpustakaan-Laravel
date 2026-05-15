@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .title {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .action {
        display: flex;
        justify-content: center;
    }

    .action form {
        margin: 10px;
    }

    button {
        width: 80px;
    }
</style>

@extends('layout.menu')
@section("contents")

<div class="card">
    <div class="card-body">

<div class="title">

    <h1>Table Buku</h1>
    
    <form action="{{route('buku.add')}}">
        <button class="btn btn-primary btn-sm mb-2" type="submit">Add Data</button>
    </form>

</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            {{-- <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Jumlah Total</th>
            <th>Jumlah Tersedia</th>
            <th>Kategori ID</th> --}}
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $b)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>BK-0{{$b->kode_buku}}</td>
            <td>{{$b->judul}}</td>
            <td>{{$b->penulis}}</td>
            <td>{{$b->penerbit}}</td>
            <td>{{$b->nama_kategori}}</td>
            <td>{{$b->deskripsi}}</td>
            <td class="action">
                <form action="{{route('buku.edit', $b->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('buku.delete', $b->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$b->kode_buku}}');">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-sm mb-2">
                        Delete 
                    </button>
                </form>
            </td>
        @endforeach
        </tr>
    </tbody>
</table>

    </div>
</div>

@endsection
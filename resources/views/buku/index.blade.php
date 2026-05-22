@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .Header {
        display: flex;
        justify-content: space-between;
    }

    .action {
        display: flex;
        justify-content: space-evenly
    }

    th {
        background: rgb(70, 84, 111) !important;
        color: white !important;
    }

    .Header i, .action i {
        width: 15px;
        height: 15px;
    }
</style>

@extends('layout.menu')
@section("contents")

<div class = "Header">       
    <h1>Table Buku</h1>

    <form action="{{route('buku.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Data     
        </button>
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
            <td>B-{{$b->kode_buku}}</td>
            <td>{{$b->judul}}</td>
            <td>{{$b->penulis}}</td>
            <td>{{$b->penerbit}}</td>
            <td>{{$b->nama_kategori}}</td>
            <td>{{$b->deskripsi}}</td>
            <td class="action">
                <form action="{{route('buku.edit', $b->id)}}">
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('buku.delete', $b->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$b->kode_buku}}');">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger mr-2 ml-2">
                        <i class="fa fa-trash"></i> 
                    </button>
                </form>
            </td>
        @endforeach
        </tr>
    </tbody>
</table>

@endsection
@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .title {
        display: flex
    }

    .action {
        display: flex;
        justify-content: center;
    }

    .action form {
        margin: 10px;
    }

    button {
        width: 80px
    }
</style>

@extends('layout.menu')
@section("contents")

<div class="card">
    <div class="card-body">

<div class = "title">       
    <h1>Table Kategori</h1>

    <form action="{{route('kategori.add')}}" style="margin: 8px 0px 0px 1179px">
        <button type="submit" class="btn btn-primary btn-sm mb-2">Add Data</button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th style="width: 10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategori as $k)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$k->nama_kategori}}</td>
            <td>{{$k->deskripsi}}</td>
            <td class="action">
                <form action="{{route('kategori.edit', $k->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('kategori.delete', $k->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$k->kode_anggota}}');">
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
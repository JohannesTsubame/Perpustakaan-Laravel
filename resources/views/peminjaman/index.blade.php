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
    <h1>Table Peminjaman</h1>

    <form action="{{route('peminjaman.add')}}" style="margin: 8px 0px 0px 1146px">
        <button type="submit" class="btn btn-primary btn-sm mb-2">Add Data</button>
    </form>
</div>


<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Nama Pengguna</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $p)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$p->nama_anggota}}</td>
            <td>{{$p->nama_pengguna}}</td>
            <td>{{$p->tanggal_pinjam}}</td>
            <td>{{$p->tanggal_kembali}}</td>
            <td>{{$p->status}}</td>
            <td class="action">
                <form action="{{route('peminjaman.edit', $p->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('peminjaman.delete', $p->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode peminjaman : {{$p->id}}');">
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
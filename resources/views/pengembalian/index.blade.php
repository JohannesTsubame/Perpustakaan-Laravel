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
    <h1>Table Pengembalian</h1>

    <form action="{{route('pengembalian.add')}}" style="margin: 8px 0px 0px 1074px">
        <button type="submit" class="btn btn-primary btn-sm mb-2">Add Data</button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjaman ID</th>
            <th>Tanggal Dikembalikan</th>
            <th>Denda</th>
            <th>Kondisi Buku</th>
            <th style="width: 10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengembalian as $p)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$p->peminjaman_id}}</td>
            <td>{{$p->tanggal_dikembalikan}}</td>
            <td>{{$p->denda}}</td>
            <td>{{$p->kondisi_buku}}</td>
            <td class="action">
                <form action="{{route('pengembalian.edit', $p->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('pengembalian.delete', $p->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? ID Peminjaman : {{$p->peminjaman_id}}');">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-sm mb-2">
                        Delete 
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>

@endsection
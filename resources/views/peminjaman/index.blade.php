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
    <h1>Table Peminjaman</h1>

    <form action="{{route('peminjaman.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-plus"></i> Add Data     
        </button>
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
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('peminjaman.delete', $p->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode peminjaman : {{$p->id}}');">
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

    </div>
</div>

@endsection
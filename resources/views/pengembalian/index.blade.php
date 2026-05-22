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
    <h1>Table Pengembalian</h1>

    <form action="{{route('pengembalian.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-plus"></i> Add Data     
        </button>
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
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('pengembalian.delete', $p->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? ID Peminjaman : {{$p->peminjaman_id}}');">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger mr-2 ml-2">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
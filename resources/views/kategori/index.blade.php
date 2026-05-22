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
    <h1>Table Kategori</h1>

    <form action="{{route('anggota.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-plus"></i> Add Data     
        </button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">No</th>
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
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('kategori.delete', $k->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$k->kode_anggota}}');">
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
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
    <h1>Table Anggota</h1>

    <form action="{{route('anggota.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-plus"></i> Add Data     
        </button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>E-Mail</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $a)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>A-{{$a->kode_anggota}}</td>
            <td>{{$a->nama}}</td>
            <td>{{$a->alamat}}</td>
            <td>{{$a->no_hp}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->tanggal_daftar}}</td>
            <td>{{$a->status}}</td>
            <td class="action">
                <form action="{{route('anggota.edit', $a->id)}}">
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('anggota.delete', $a->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$a->kode_anggota}}');">
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

    </div>
</div>

@endsection
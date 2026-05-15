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
    <h1>Table Anggota</h1>

    <form action="{{route('anggota.add')}}" style="margin: 8px 0px 0px 1179px">
        <button type="submit" class="btn btn-primary btn-sm mb-2">Add Data</button>
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
            <td>{{$a->kode_anggota}}</td>
            <td>{{$a->nama}}</td>
            <td>{{$a->alamat}}</td>
            <td>{{$a->no_hp}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->tanggal_daftar}}</td>
            <td>{{$a->status}}</td>
            <td class="action">
                <form action="{{route('anggota.edit', $a->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('anggota.delete', $a->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? Kode Anggota : {{$a->kode_anggota}}');">
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
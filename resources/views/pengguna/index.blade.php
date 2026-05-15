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
    <h1>Table Pengguna</h1>

    <form action="{{route('pengguna.add')}}" style="margin: 8px 0px 0px 1150px">
        <button type="submit" class="btn btn-primary btn-sm mb-2">Add Data</button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Peran</th>
            <th style="width: 10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengguna as $p)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$p->nama}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->password}}</td>
            <td>{{$p->peran}}</td>
            <td class="action">
                <form action="{{route('pengguna.edit', $p->id)}}">
                    <button type="submit" class="btn btn-success btn-sm mb-2">Edit</button>
                </form>
                <form 
                action="{{route('pengguna.delete', $p->id)}}"
                method="POST" 
                onsubmit="return confirm('Yakin ingin menghapus data ini? ID Pengguna : {{$p->id}}');">
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

@endsection
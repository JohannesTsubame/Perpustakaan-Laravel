@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layout.menu')
@section("contents")

<style>
    .card-header {
        display: flex;
        justify-content: space-between;
    }

    .action {
        display: flex;
        justify-content: flex-end;
    }

    label {
        font-size: 20px
    }

    button {
        width: 120px;
    }
</style>

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Pengguna</h2>
        <a href="{{route('pengguna.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="{{route('pengguna.save')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2">Nama :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nama" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Email :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Password :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="password" reuired>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2">Peran :</label>
                <div class="col-sm-10">
                    <select class="form-control" name="peran">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
            </div>

            <div class="action">
                <button type="submit" class="btn btn-primary" style="font-size: 20px">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
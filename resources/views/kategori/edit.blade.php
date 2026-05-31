@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
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

    <script>
        function ConfirmUpdate() {
            Swal.fire({
                icon : 'question',
                iconColor : "#ffae5a",
                title : 'Are You Sure You Want to Update the Data?',
                confirmButtonText : 'Update',
                confirmButtonColor : "#446fff",
                showCancelButton : true,
                theme : "dark",
                background : "#202a3e",
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed){
                    document.getElementById("Form").submit()
                }
            });
        }

        document.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                ConfirmUpdate();
            }
        });
    </script>
</head>

@extends('layout.menu')
@section("contents")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Kategori</h2>
        <a href="{{route('kategori.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('kategori.update', $kategori->id)}}" method="POST">
            @csrf
            @method("PUT")

            <div class="form-group row">
                <label class="col-sm-2">Nama Kategori :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nama_kategori" value="{{old('nama_kategori', $kategori->nama_kategori)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Deskripsi :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="deskripsi" value="{{old('deskripsi', $kategori->deskripsi)}}" required>
                </div>
            </div>

            <div class="action">
                <button type="button"
                        class="btn btn-primary" 
                        style="font-size: 20px"
                        onclick="ConfirmUpdate()">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
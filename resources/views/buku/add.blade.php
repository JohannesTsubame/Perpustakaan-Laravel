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
        function ConfirmAdd() {
            Swal.fire({
                icon : 'question',
                iconColor : "#ffae5a",
                title : 'Are You Sure You Want to Add the Data?',
                confirmButtonText : 'Add',
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
                ConfirmAdd();
            }
        });
    </script>
</head>

@extends('layout.menu')
@section("contents")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Buku</h2>
        <a href="{{route('buku.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('buku.save')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2">Kode Buku :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="kode_buku" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Judul :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="judul" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Penulis :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="penulis" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Penerbit :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="penerbit" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kategori:</label>
                <div class="col-sm-10">
                    <select name="kategori_id" class="form-control" required>
                        <option value="">- - Select - -</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id}}">
                            {{ $k->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tahun Terbit :</label>
                <div class="col-sm-10"> 
                    <input class="form-control" type="number" min="1901" max="2099" step="1" value="2026" name="tahun_terbit" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">ISBN :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="isbn" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Jumlah Total :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="jumlah_total" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Jumlah Tersedia :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="jumlah_tersedia" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="pic" class="form-control" accept=".jpg, .jpeg, .png, .webp">
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('pic')
                    {{$message}}
                    @enderror
                </div>
            </div>
            
            <div class="action">
                <button type="button" onclick="ConfirmAdd()" class="btn btn-primary" style="font-size: 20px">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </div>
    </div>
</form>

@endsection
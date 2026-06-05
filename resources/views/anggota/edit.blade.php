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
        <h2 style="color:white">Edit Data Anggota</h2>
        <a href="{{route('anggota.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id = "Form" action="{{route('anggota.update', $anggota->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="form-group row">
                <label class="col-sm-2">Kode Anggota :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="kode_anggota" value={{old("kode_anggota", $anggota->kode_anggota)}} readonly required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nama" value={{old("nama", $anggota->nama)}} required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Alamat :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="alamat" value={{old("alamat", $anggota->alamat)}} required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">No. HP :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="no_hp" value={{old("no_hp", $anggota->no_hp)}} required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Email :</label>
                <div class="col-sm-10"> 
                    <input class="form-control" type="email" name="email" value={{old("email", $anggota->email)}} required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Daftar :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" name="tanggal_daftar" value={{old("tanggal_daftar", $anggota->tanggal_daftar)}} required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Status :</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status" required>
                        
                            <option value="aktif">aktif</option>
                            <option value="nonaktif">nonaktif</option>
                    </select>
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
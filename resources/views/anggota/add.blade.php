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
    
<div class="card"">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Anggota</h2>
        <a href="{{route('anggota.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('anggota.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Kode Anggota :</label>
                <div class="col-sm-10">
                    <input type="text" name="kode_anggota" class="form-control" required>
                </div>
            </div>

            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Alamat :</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>    
            </div>
            
            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">No. HP :</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Email :</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Tanggal Daftar :</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal_daftar" class="form-control" required>
                </div>
            </div>

            <div class="form-group row" style="font-size: 20px">
                <label class="col-sm-2">Status :</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control" class="form-control" required>
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
                        onclick="ConfirmAdd()">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
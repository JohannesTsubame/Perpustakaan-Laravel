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
        <h2 style="color:white">Tambah Data Pengembalian</h2>
        <a href="{{route('pengembalian.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('pengembalian.save')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2">ID :</label>
                <div class="col-sm-10">
                    <select class="form-control" name="peminjaman_id">
                        @foreach($peminjaman as $p)
                            <option value = "{{$p->id}}">{{$p->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tgl Dikembalikan :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" name="tanggal_dikembalikan" required>
                </div>
            </div>    

            <div class="form-group row">
                <label class="col-sm-2">Denda :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="denda" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kondisi Buku :</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kondisi_buku">
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                        <option value="hilang">Hilang</option>
                    </select>
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
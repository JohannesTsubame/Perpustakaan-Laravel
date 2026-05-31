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
        <h2 style="color:white">Tambah Data Peminjaman</h2>
        <a href="{{route('peminjaman.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('peminjaman.save')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2">Anggota ID :</label>
                <div class="col-sm-10">
                    @if (empty($anggota->id) == False)
                        Anggota Tidak Ada, <a href="{{route('anggota.add')}}">Tambahkan Anggota.</a>
                    @else
                        <select class="form-control" name="anggota_id">
                            @foreach ($anggota as $p)
                                <option value="{{ $p->id }}">{{ $p->id }} ({{$p->nama}})</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Pengguna ID :</label>
                <div class="col-sm-10">
                    @if (empty($pengguna->id) == False)
                        Pengguna Tidak Ada, <a href="{{route('pengguna.add')}}">Tambahkan Pengguna.</a>
                    @else
                        <select class="form-control" name="pengguna_id">
                            @foreach ($pengguna as $p)
                                <option value="{{ $p->id }}">{{ $p->id }} ({{$p->nama}})</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Pinjam :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_pinjam" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Kembali :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_kembali" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Status :</label>
                <div class="col-sm-10"> 
                <select class="form-control" name="status">
                    <option value="dipinjam">Dipinjam</option>
                    <option value="kembali">Kembali</option>
                </select>
            </div>
            </div>
            
            @if (empty($peminjaman->id) == False)
                peminjaman Tidak Ada, <a href="{{route('peminjaman.add')}}">Tambahkan peminjaman.</a>
            @elseif (empty($pengguna->id) == False)
                Pengguna Tidak Ada, <a href="{{route('pengguna.add')}}">Tambahkan Pengguna.</a>
            @else
                <div class="action">
                    <button type="button" 
                            class="btn btn-primary" 
                            style="font-size: 20px"
                            onclick="ConfirmAdd()">
                        <i class="fa fa-save mr-2"></i> Save
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
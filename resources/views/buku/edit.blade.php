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
        <h2 style="color:white">Tambah Data Buku</h2>
        <a href="{{route('buku.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('buku.update', $buku->id)}}" method="POST">
            @csrf
            @method("PUT")

            <div class="form-group row">
                <label class="col-sm-2">Kode Buku :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="kode_buku" value="{{old('kode_buku', $buku->kode_buku)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Judul :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="judul" value="{{old('judul', $buku->judul)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Penulis :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="penulis" value="{{old('penulis', $buku->penulis)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Penerbit :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="penerbit" value="{{old('penerbit', $buku->penerbit)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kategori_id">
                        <option value="">- - SELECT - -</option>
                        @foreach ($kategori as $k)
                            <option value="{{$k->id}}" {{old('id', $k->id) == $buku->kategori_id ? 'selected' : ''}}>
                                {{$k->nama_kategori}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tahun Terbit : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" min="1901" max="2099" step="1" value="2026" name="tahun_terbit" value="{{old('tahun_terbit', $buku->tahun_terbit)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">ISBN :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="isbn" value="{{old('isbn', $buku->isbn)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Jumlah Total :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="jumlah_total" value="{{old('jumlah_total', $buku->jumlah_total)}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Jumlah Tersedia :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="jumlah_tersedia"value="{{old('jumlah_tersedia', $buku->jumlah_tersedia)}}" required>
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
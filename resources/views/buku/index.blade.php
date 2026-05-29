@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <style>
        .Header {
            display: flex;
            justify-content: space-between;
        }

        .action {
            display: flex;
            justify-content: space-evenly
        }

        th {
            background: rgb(70, 84, 111) !important;
            color: white !important;
        }

        .Header i, .action i {
            width: 15px;
            height: 15px;
        }
    </style>

    <script>
        function ConfirmDelete(item) {
            Swal.fire({
                icon : 'warning',
                iconColor : "#ff2222",
                title : "Are You Sure You Want to Delete this Data?",
                text : `Data ID B-${item}`,
                confirmButtonText : 'Delete',
                confirmButtonColor : "ff2222",
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
    </script>
</head>

@extends('layout.menu')
@section("contents")

@if(session('save'))
    <script>
        Swal.fire({
            title: "{{session('save')['judul']}}",
            theme : "dark",
            text: "{{session('save')['pesan']}}",
            icon: "{{session('save')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@elseif(session("update"))
    <script>
        Swal.fire({
            title: "{{session('update')['judul']}}",
            theme: "dark",
            text: "{{session('update')['pesan']}}",
            icon: "{{session('update')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@elseif(session("delete"))
    <script>
        Swal.fire({
            title: "{{session('delete')['judul']}}",
            theme: "dark",
            text: "{{session('delete')['pesan']}}",
            icon: "{{session('delete')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@endif

<div class = "Header">       
    <h1>Table Buku</h1>

    <form action="{{route('buku.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Data     
        </button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            {{-- <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Jumlah Total</th>
            <th>Jumlah Tersedia</th>
            <th>Kategori ID</th> --}}
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $b)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>B-{{$b->kode_buku}}</td>
            <td>{{$b->judul}}</td>
            <td>{{$b->penulis}}</td>
            <td>{{$b->penerbit}}</td>
            <td>{{$b->nama_kategori}}</td>
            <td>{{$b->deskripsi}}</td>
            <td class="action">
                <form action="{{route('buku.edit', $b->id)}}">
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                action="{{route('buku.delete', $b->id)}}"
                method="POST"> 
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-danger mr-2 ml-2" onclick="ConfirmDelete({{ $b->kode_buku }})">
                        <i class="fa fa-trash"></i> 
                    </button>
                </form>
            </td>
        @endforeach
        </tr>
    </tbody>
</table>

@endsection
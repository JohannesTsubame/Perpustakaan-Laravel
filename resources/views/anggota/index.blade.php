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
                text : `Data ID A-${item}`,
                confirmButtonText : 'Delete',
                confirmButtonColor : "#ff2222",
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
    <h1>Table Anggota</h1>

    <form action="{{route('anggota.add')}}" class="mt-2">
        <button type="submit" class="btn btn-primary ml-2">
            <i class="fa fa-plus"></i> Add Data     
        </button>
    </form>
</div>

<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>E-Mail</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $a)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>A-{{$a->kode_anggota}}</td>
            <td>{{$a->nama}}</td>
            <td>{{$a->alamat}}</td>
            <td>{{$a->no_hp}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->tanggal_daftar}}</td>
            <td>{{$a->status}}</td>
            <td class="action">
                <form action="{{route('anggota.edit', $a->id)}}">
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form id="Form"
                      action="{{route('anggota.delete', $a->id)}}"
                      method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="button" 
                            class="btn btn-danger mr-2 ml-2"
                            onclick="ConfirmDelete({{ $a->kode_anggota }})">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
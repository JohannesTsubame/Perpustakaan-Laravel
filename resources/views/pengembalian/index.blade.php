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
        function ConfirmDelete(item, id) {
            Swal.fire({
                icon : 'warning',
                iconColor : "#ff2222",
                title : "Are You Sure You Want to Delete this Data?",
                text : `Data ID ${item}`,
                confirmButtonText : 'Delete',
                confirmButtonColor : "#ff2222",
                showCancelButton : true,
                theme : "dark",
                background : "#202a3e",
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed){
                    document.getElementById(`Form${id}`).submit()
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
    <h1>Table Pengembalian</h1>

    <div style="display: flex">
        <form action="{{route('pengembalian.print_data')}}" class="mt-2" target="_blank">
            <button type="submit" class="btn btn-danger ml-2">
                <i class="fa fa-print"></i> Print Data     
            </button>
        </form>

        <form action="{{route('pengembalian.export')}}" class="mt-2" target="_blank">
            <button type="submit" class="btn btn-success ml-2">
                <i class="fa fa-table"></i> Export Data     
            </button>
        </form>

        <form action="{{route('pengembalian.add')}}" class="mt-2">
            <button type="submit" class="btn btn-primary ml-2">
                <i class="fa fa-plus"></i> Add Data     
            </button>
        </form>
    </div>
</div>


<table class="table table-bordered table-hover flex-1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjaman ID</th>
            <th>Tanggal Dikembalikan</th>
            <th>Denda</th>
            <th>Kondisi Buku</th>
            <th style="width: 10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengembalian as $p)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>P-{{$p->peminjaman_id}}</td>
            <td>{{$p->tanggal_dikembalikan}}</td>
            <td>{{$p->denda}}</td>
            <td>{{$p->kondisi_buku}}</td>
            <td class="action">
                <form action="{{route('pengembalian.edit', $p->id)}}">
                    <button type="submit" class="btn btn-info mr-2 ml-2">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form 
                id="Form{{ $p->id }}"
                action="{{route('pengembalian.delete', $p->id)}}"
                method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="button" onclick="ConfirmDelete({{ $p->peminjaman_id }}, {{ $p->id }})" class="btn btn-danger mr-2 ml-2">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
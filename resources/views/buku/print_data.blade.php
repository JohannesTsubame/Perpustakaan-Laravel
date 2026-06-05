<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Buku </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $b)
                <tr>
                    <td>B-{{$b->kode_buku}}</td>
                    <td>{{$b->judul}}</td>
                    <td>{{$b->penulis}}</td>
                    <td>{{$b->penerbit}}</td>
                    <td>{{$b->nama_kategori}}</td>
                    <td>{{$b->deskripsi}}</td>
                    <td>
                        @if ($b->pic)
                            <a href="{{ asset('uploads/buku_pic/' . $b->pic) }}" target=_blank>
                                <img src="{{ asset('uploads/buku_pic/' . $b->pic) }}"
                                    style="width: 100px; height: auto;" />
                            </a>
                        @else
                            No Foto
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>

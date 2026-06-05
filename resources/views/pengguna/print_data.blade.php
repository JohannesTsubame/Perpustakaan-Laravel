<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pengguna </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                {{-- <th>Password</th> --}}
                <th>Peran</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengguna as $p)
                <tr>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->email}}</td>
                    {{-- <td>{{$p->password}}</td> --}}
                    <td>{{$p->peran}}</td>
                    <td>
                        @if ($p->pic)
                            <a href="{{ asset('uploads/pengguna_pic/' . $p->pic) }}" target=_blank>
                                <img src="{{ asset('uploads/pengguna_pic/' . $p->pic) }}"
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

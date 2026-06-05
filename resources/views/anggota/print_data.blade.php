<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Anggota </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>E-Mail</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $a)
                <tr>
                    <td>A-{{ $a->kode_anggota }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->tanggal_daftar }}</td>
                    <td>{{ $a->status }}</td>
                    <td>
                        @if ($a->pic)
                            <a href="{{ asset('uploads/anggota_pic/' . $a->pic) }}" target=_blank>
                                <img src="{{ asset('uploads/anggota_pic/' . $a->pic) }}"style="width: 100px; height: auto;" />
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

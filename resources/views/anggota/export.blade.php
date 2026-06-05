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
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>A-{{ $a->kode_anggota }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->tanggal_daftar }}</td>
                    <td>{{ $a->status }}</td>
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

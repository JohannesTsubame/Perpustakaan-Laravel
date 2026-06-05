<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Peminjaman </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Nama Pengguna</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $p)
                <tr>
                    <td>{{$p->nama_anggota}}</td>
                    <td>{{$p->nama_pengguna}}</td>
                    <td>{{$p->tanggal_pinjam}}</td>
                    <td>{{$p->tanggal_kembali}}</td>
                    <td>{{$p->status}}</td>
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

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pengembalian </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Peminjaman ID</th>
                <th>Tanggal Dikembalikan</th>
                <th>Denda</th>
                <th>Kondisi Buku</th>
            </tr>
        </thead>
        <tbody>
           @foreach($pengembalian as $p)
                <tr>
                    <td>P-{{$p->peminjaman_id}}</td>
                    <td>{{$p->tanggal_dikembalikan}}</td>
                    <td>{{$p->denda}}</td>
                    <td>{{$p->kondisi_buku}}</td>
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

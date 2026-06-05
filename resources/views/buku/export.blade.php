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
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $b)
                <tr>
                    <td>B-{{$b->kode_buku}}</td>
                    <td>{{$b->judul}}</td>
                    <td>{{$b->penulis}}</td>
                    <td>{{$b->penerbit}}</td>
                    <td>{{$b->nama_kategori}}</td>
                    <td>{{$b->deskripsi}}</td>
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

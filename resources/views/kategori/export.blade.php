<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Kategori </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $k)
                <tr>
                    <td>{{$k->nama_kategori}}</td>
                    <td>{{$k->deskripsi}}</td>
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

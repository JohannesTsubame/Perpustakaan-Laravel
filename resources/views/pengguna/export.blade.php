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
            </tr>
        </thead>
        <tbody>
           @foreach($pengguna as $p)
                <tr>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->email}}</td>
                    {{-- <td>{{$p->password}}</td> --}}
                    <td>{{$p->peran}}</td>
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

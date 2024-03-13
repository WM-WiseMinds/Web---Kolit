<div>
    <h2> Detail Pelanggan Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid; padding: 8px;">ID</th>
                <th style="border: 1px solid; padding: 8px;">Nama Pelanggan</th>
                <th style="border: 1px solid; padding: 8px;">Alamat</th>
                <th style="border: 1px solid; padding: 8px;">No Telp</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datasource as $detailpelanggan)
                <tr>
                    <td style="border: 1px solid; padding: 8px;">{{ $detailpelanggan->id }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $detailpelanggan->user->name }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $detailpelanggan->alamat }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $detailpelanggan->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

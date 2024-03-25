<div>
    <h2>Portfolio Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid; padding: 8px;">ID</th>
                <th style="border: 1px solid; padding: 8px;">Judul</th>
                <th style="border: 1px solid; padding: 8px;">Nama Barang</th>
                <th style="border: 1px solid; padding: 8px;">Deskripsi</th>
                <th style="border: 1px solid; padding: 8px;">Tanggal Pengerjaan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datasource as $portfolio)
                <tr>
                    <td style="border: 1px solid; padding: 8px;">{{ $portfolio->id }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $portfolio->judul }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $portfolio->barang->nama_barang }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $portfolio->deskripsi }}</td>
                    <td style="border: 1px solid; padding: 8px;">{{ $portfolio->tanggal_pengerjaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

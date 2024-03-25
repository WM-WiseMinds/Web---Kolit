<div>
    <h2> Transaksi Table</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #000; padding: 8px;"> Id </th>
                <th style="border: 1px solid #000; padding: 8px;"> Nama </th>
                <th style="border: 1px solid #000; padding: 8px;"> Total Harga </th>
                <th style="border: 1px solid #000; padding: 8px;"> Tanggal Transaksi </th>
                <th style="border: 1px solid #000; padding: 8px;"> Status </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($datasource as $transaksi)
                <tr>
                    <td style="border: 1px solid #000; padding: 8px;"> {{ $transaksi->id }} </td>
                    <td style="border: 1px solid #000; padding: 8px;"> {{ $transaksi->name }} </td>
                    <td style="border: 1px solid #000; padding: 8px;">
                        Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }} </td>
                    <td style="border: 1px solid #000; padding: 8px;"> {{ $transaksi->created_at }} </td>
                    <td style="border: 1px solid #000; padding: 8px;"> {{ $transaksi->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

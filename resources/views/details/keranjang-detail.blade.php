<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama Barang</td>
                <td class="border px-4 py-2">{{ $row->barang->nama_barang }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jumlah</td>
                <td class="border px-4 py-2">{{ $row->jumlah }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Tipe Ukuran</td>
                <td class="border px-4 py-2">{{ $row->tipe_ukuran }}</td>
            </tr>
            @if ($row->ukuran_id)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Ukuran</td>
                    <td class="border px-4 py-2">{{ $row->ukuran->ukuran }}</td>
                </tr>
            @endif
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Volume (Panjang x Lebar x Tinggi)</td>
                <td class="border px-4 py-2">
                    @if ($row->ukuran_id)
                        {{ $row->ukuran->panjang }} cm x {{ $row->ukuran->lebar }} cm x {{ $row->ukuran->tinggi }} cm
                    @else
                        {{ $row->ukuran_custom->panjang }} cm x {{ $row->ukuran_custom->lebar }} cm x
                        {{ $row->ukuran_custom->tinggi }} cm
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Harga Satuan</td>
                <td class="border px-4 py-2">
                    @if ($row->ukuran_id)
                        Rp {{ number_format($row->ukuran->harga, 0, ',', '.') }}
                    @else
                        Rp {{ number_format($row->ukuran_custom->harga, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Harga Total</td>
                <td class="border px-4 py-2">
                    @if ($row->ukuran_id)
                        Rp {{ number_format($row->jumlah * $row->ukuran->harga, 0, ',', '.') }}
                    @else
                        Rp {{ number_format($row->jumlah * $row->ukuran_custom->harga, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            {{-- {{ dump($row) }} --}}
        </tbody>
    </table>
</div>

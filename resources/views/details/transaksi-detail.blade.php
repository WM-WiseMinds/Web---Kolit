<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">ID Transaksi</td>
                <td class="border px-4 py-2">{{ $row->user->id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama Pembeli</td>
                <td class="border px-4 py-2">{{ $row->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Total Harga</td>
                <td class="border px-4 py-2">{{ $row->total_harga }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Status Transaksi</td>
                <td class="border px-4 py-2">{{ $row->status }}</td>
            </tr>
            @if ($row->bukti_pembayaran)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Bukti Pembayaran</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/' . $row->bukti_pembayaran) }}" alt="Bukti_pembayaran"
                            class="w-32 h-32 object-cover mb-5">
                        <x-button>
                            <a href="{{ asset('storage/' . $row->bukti_pembayaran) }}" download>
                                Download
                            </a>
                        </x-button>
                    </td>

                </tr>
            @endif
        </tbody>
    </table>
    <table class="table-auto w-full my-3">
        <thead>
            <tr>
                <th class="border b-2 px-4 py-2 text-sm font-bold text-center" colspan="4">Detail Transaksi</th>
            </tr>
            <tr>
                <th class="border b-2 px-4 py-2 text-sm font-semibold">Nama Barang</th>
                <th class="border b-2 px-4 py-2 text-sm font-semibold">Ukuran</th>
                <th class="border b-2 px-4 py-2 text-sm font-semibold">Jumlah</th>
                <th class="border b-2 px-4 py-2 text-sm font-semibold">Harga Satuan</th>
            </tr>
        <tbody>
            @foreach ($row->detailtransaksi as $detail)
                <tr>
                    <td class="border px-4 py-2">{{ $detail->nama_barang }}</td>
                    <td class="border px-4 py-2">{{ $detail->ukuran }}</td>
                    <td class="border px-4 py-2">{{ $detail->jumlah }}</td>
                    <td class="border px-4 py-2">
                        {{ 'Rp ' . number_format($detail->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

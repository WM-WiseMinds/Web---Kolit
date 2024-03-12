<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama Barang</td>
                <td class="border px-4 py-2">{{ $row->nama_barang }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Judul</td>
                <td class="border px-4 py-2">{{ $row->judul }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Deskripsi</td>
                <td class="border px-4 py-2">{{ $row->deskripsi }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Tanggal Pengerjaan</td>
                <td class="border px-4 py-2">{{ $row->tanggal_pengerjaan_formatted }}</td>
            </tr>
            @if ($row->gambar)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Gambar Portfolio</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/' . $row->gambar) }}" alt="Gambar"
                            class="w-32 h-32 object-cover mb-5">
                        <x-button>
                            <a href="{{ asset('storage/' . $row->gambar) }}" download>
                                Download
                            </a>
                        </x-button>
                    </td>

                </tr>
            @endif
        </tbody>
    </table>
</div>

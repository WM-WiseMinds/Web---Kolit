<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama Penanya</td>
                <td class="border px-4 py-2">{{ $row->nama_penanya }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Pertanyaan</td>
                <td class="border px-4 py-2">{{ $row->pertanyaan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Nama Penjawab</td>
                <td class="border px-4 py-2">{{ $row->nama_penjawab }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jawaban</td>
                <td class="border px-4 py-2">{{ $row->jawaban }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Tanggal Dibuat</td>
                <td class="border px-4 py-2">{{ $row->created_at_formatted }}</td>
            </tr>
        </tbody>
    </table>
</div>

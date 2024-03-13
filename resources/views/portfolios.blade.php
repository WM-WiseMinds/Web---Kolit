<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="text-xl">
                <h1 class="text-center text-4xl font-bold mt-10">Portfolio</h1>
            </div>

            <div class="flex justify-center my-5 flex-wrap">
                @foreach ($portfolios as $portfolio)
                    <div class="card w-96 mx-2 bg-base-100 shadow-xl my-3">
                        <figure><img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="{{ $portfolio->judul }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $portfolio->judul }}</h2>
                            <p>{{ $portfolio->barang->nama_barang }}</p>
                            <p>{{ $portfolio->deskripsi }}</p>
                            <p>{{ \Carbon\Carbon::parse($portfolio->tanggal_pengerjaan)->format('d-m-Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @livewire('footer')
    </div>
</x-guest-layout>

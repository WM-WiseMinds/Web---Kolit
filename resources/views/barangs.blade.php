<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="text-xl">
                <h1 class="text-center text-4xl font-bold mt-10">Barang</h1>
            </div>

            <div class="flex justify-center my-5 flex-wrap">
                @foreach ($barang as $item)
                    <div class="card w-96 mx-2 bg-base-100 shadow-xl my-3">
                        <figure><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_barang }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->nama_barang }}</h2>
                            <p>{{ $item->keterangan }}</p>
                            <div class="card-actions justify-end">
                                <a class="btn btn-primary"
                                    href="{{ route('detail-barang', ['id' => $item->id]) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @livewire('footer')
    </div>
</x-guest-layout>

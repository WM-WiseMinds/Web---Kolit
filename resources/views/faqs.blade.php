<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="text-xl">
                <h1 class="text-center text-4xl font-bold mt-10">FAQ</h1>
            </div>

            @auth
                <div class="flex justify-center mt-5">
                    <button class="btn btn-primary"
                        onclick="Livewire.dispatch('openModal', { component: 'faq-form', arguments: { bertanyaOnlyMode: true } })"">
                        Tanya Sekarang
                    </button>
                </div>
            @endauth

            <div class="flex justify-center my-5 flex-wrap">
                @foreach ($faqs as $faq)
                    <details class="collapse bg-base-200 mx-14 mt-5 w-64">
                        <summary class="collapse-title text-xl font-medium">
                            {{ $faq->pertanyaan }}
                        </summary>
                        <div class="collapse-content flex flex-col justify-between h-full">
                            <div>
                                <p class="font-bold">{{ $faq->jawaban }}</p>
                                <div class="flex justify-between mt-5">
                                    <div>
                                        <p>Penanya : {{ $faq->penanya->name }}</p>
                                        <p>Penjawab : {{ $faq->penjawab ? $faq->penjawab->name : 'N/A' }}
                                    </div>
                                    <p>{{ $faq->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </details>
                @endforeach
            </div>

        </div>
        @livewire('footer')
    </div>
</x-guest-layout>

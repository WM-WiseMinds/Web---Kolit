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
                <details class="collapse bg-base-200 mx-14">
                    <summary class="collapse-title text-xl font-medium">Click to open/close</summary>
                    <div class="collapse-content">
                        <p>content</p>
                    </div>
                </details>
            </div>

        </div>
        @livewire('footer')
    </div>
</x-guest-layout>

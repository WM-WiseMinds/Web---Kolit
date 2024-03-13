<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="hero h-[75vh]"
                style="background-image: url(https://images.unsplash.com/photo-1556702571-3e11dd2b1a92?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-center text-neutral-content">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">Furniture Interior Berkualitas untuk Rumah Anda</h1>
                        <p class="mb-5">Pw Interior – Solusi terpercaya untuk kebutuhan furniture interior rumah Anda
                            sejak 2021.</p>
                        <a class="btn btn-primary" href="{{ route('register') }}">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit bg-gray-300 py-10">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div>
                        <h1 class="text-5xl font-bold text-center">Pw Interior</h1>
                        <p class="py-6 text-center">
                            Pw Interior merupakan perusahaan pembuatan furniture interior yang berdiri sejak tahun 2021.
                            Kami menghadirkan solusi untuk mempercantik isi rumah Anda dengan furniture berkualitas.
                            Dengan sistem pengerjaan yang fleksibel sesuai keinginan konsumen, kami siap membantu Anda
                            mewujudkan desain interior impian.

                            Pw Interior telah sukses menarik minat konsumen tidak hanya di lingkungan lokal, tetapi juga
                            hingga tamu luar negeri yang membangun properti di sekitar wilayah Bali. Kami mengerjakan
                            sekitar 6-7 proyek per bulan dengan estimasi waktu pengerjaan yang disesuaikan dengan
                            banyaknya permintaan dari konsumen.
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit py-10 bg-base-200">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <img src="https://images.unsplash.com/photo-1585128792020-803d29415281?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                        <h1 class="text-5xl font-bold">Keunggulan Pw Interior</h1>
                        <ul class="list-none p-0 mt-4 text-gray-700">
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Desain Sesuai Keinginan</span>
                                <p>Konsultasikan desain impian Anda, kami wujudkan.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Bahan Berkualitas</span>
                                <p>Kami menggunakan bahan terbaik untuk furniture Anda.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Pengerjaan Profesional</span>
                                <p>Tim kami siap mengerjakan pesanan Anda dengan profesional dan teliti.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Pelayanan Prima</span>
                                <p>Kami mengutamakan kepuasan konsumen dengan pelayanan terbaik.</p>
                            </li>
                            <li class="py-2">
                                <span class="text-xl font-bold">Jangkauan Luas</span>
                                <p>Pw Interior melayani konsumen lokal hingga mancanegara, khususnya di wilayah Bali.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>

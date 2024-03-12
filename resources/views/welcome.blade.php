<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="hero h-[75vh]"
                style="background-image: url(https://images.unsplash.com/photo-1546484396-fb3fc6f95f98?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-center text-neutral-content">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">Kemasan Berkualitas untuk Ekspor Anda</h1>
                        <p class="mb-5">UD Bali Jaya Packing – Solusi terpercaya untuk kebutuhan pengemasan kayu
                            berstandar
                            internasional.</p>
                        <a class="btn btn-primary" href="{{ route('register') }}">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit bg-gray-300 py-10">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div>
                        <h1 class="text-5xl font-bold text-center">UD Bali Jaya Packing</h1>
                        <p class="py-6 text-center">
                            UD Bali Jaya Packing merupakan mitra terpercaya bagi para pengusaha di Bali dalam mengemas
                            produk
                            mereka untuk ekspor. Sejak 2017, kami telah membantu para pengusaha meningkatkan bisnis
                            mereka
                            dengan menyediakan solusi pengemasan kayu berstandar internasional.

                            Kami menggunakan bahan baku berkualitas tinggi dan mengikuti standar internasional untuk
                            memastikan
                            keamanan dan ketahanan produk Anda. Website baru kami memudahkan Anda untuk memesan dan
                            mengelola
                            kebutuhan pengemasan Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero min-h-fit py-10 bg-base-200">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <img src="https://i.pinimg.com/564x/2f/d6/43/2fd643243a9a621e7720f5308fe2b59d.jpg"
                        class="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                        <h1 class="text-5xl font-bold">Keunggulan UD Jaya Packing</h1>
                        <ul class="list-none p-0 mt-4 text-gray-700">
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Pengalaman Terpercaya</span>
                                <p>Sejak 2017, telah membantu banyak pengusaha di Bali.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Kualitas Internasional</span>
                                <p>Bahan baku berkualitas tinggi dan mengikuti standar internasional.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Proses Mudah</span>
                                <p>Pesan dan kelola pesanan online dengan mudah dan efisien.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Informasi Lengkap</span>
                                <p>Temukan informasi lengkap tentang produk, layanan, dan panduan pengemasan ekspor.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Harga Kompetitif</span>
                                <p>Dapatkan harga terbaik untuk kebutuhan pengemasan Anda.</p>
                            </li>
                            <li class="py-2">
                                <span class="text-xl font-bold">Layanan Terbaik</span>
                                <p>Tim kami siap membantu Anda memilih solusi pengemasan yang tepat untuk produk Anda.
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

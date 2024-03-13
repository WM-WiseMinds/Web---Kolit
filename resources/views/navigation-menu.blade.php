<div class="flex h-screen bg-gray-50 dark:bg-gray-900" x-on:roles-updated.window="window.location.reload()">
    <!-- Primary Navigation Menu -->
    <aside
        class="z-10 hidden w-64 overflow-y-auto bg-gradient-to-t from-orange-700 to-orange-600 dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400 text-center">
            <a href="{{ route('dashboard') }}" class="mx-4 text-lg font-bold text-white dark:text-gray-200">
                Sistem Informasi Penjualan PW Interior
            </a>
            <ul class="mt-6">
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>

                        <span class="ml-4">Dashboard</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('permissions') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('permissions') }}" :active="request()->routeIs('permissions')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('permissions') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4">Permissions</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('roles') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('roles') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ml-4">Roles</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('users') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('users') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4">Users</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('pelanggan') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('pelanggan') }}" :active="request()->routeIs('pelanggan')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('pelanggan') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                clip-rule="evenodd" />
                            <path
                                d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>
                        <span class="ml-4">Pelanggan</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('barang') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('barang') }}" :active="request()->routeIs('barang')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('barang') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
                        </svg>
                        <span class="ml-4">Barang</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('portfolio') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('portfolio') }}" :active="request()->routeIs('portfolio')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('portfolio') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4">Portfolio</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('keranjang') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('keranjang') }}" :active="request()->routeIs('keranjang')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('keranjang') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                        <span class="ml-4">Keranjang</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('transaksi') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('transaksi') }}" :active="request()->routeIs('transaksi')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('transaksi') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                            <path fill-rule="evenodd"
                                d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-4">Transaksi</span>
                    </x-nav-link>
                </li>
                <li
                    class="relative px-6 py-3 {{ request()->routeIs('faq') ? 'bg-white' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                    <x-nav-link href="{{ route('faq') }}" :active="request()->routeIs('faq')"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('faq') ? 'text-orange-600' : 'text-white hover:text-white dark:hover:text-gray-200 dark:text-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                            <path
                                d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                        </svg>
                        <span class="ml-4">FAQ</span>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </aside>

    <div x-show="open" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <!-- Responsive Navigation Menu -->
    <aside :class="{ 'block': open, 'hidden': !open }"
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="open" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20">

        <div class="py-4 text-gray-500">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Windmill
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">{{ __('Dashboard') }}</span>
                    </x-responsive-nav-link>
                </li>
            </ul>
        </div>
    </aside>
</div>

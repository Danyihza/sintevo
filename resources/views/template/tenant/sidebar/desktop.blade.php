<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Sintevo
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @if($title == 'home')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ $title == 'home' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{ route('user.home') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3" x-data='{ isPagesMenuOpen:{{ $title == 'profile' ? 'true' : 'false' }} }'>
                @if($title == 'profile')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold {{ $title == 'profile' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isPagesMenuOpen = !isPagesMenuOpen" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-4">Profil</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'usaha' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.profile') }}/usaha">Profil Usaha</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'tim' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.profile') }}/tim">
                                Profil Tim
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data='{ isPagesMenuOpen2:{{ $title == 'informasi' ? 'true' : 'false' }} }'>
                @if($title == 'informasi')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold {{ $title == 'informasi' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isPagesMenuOpen2 = !isPagesMenuOpen2" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        <span class="ml-4">Informasi</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen2">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'pengumuman' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.informasi') }}/pengumuman">Pengumuman</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'juknis' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.informasi') }}/juknis">
                                Petunjuk Teknis
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data='{ isPagesMenuOpen3:{{ $title == 'monev' ? 'true' : 'false' }} }'>
                @if($title == 'monev')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold {{ $title == 'monev' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isPagesMenuOpen3 = !isPagesMenuOpen3" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                        <span class="ml-4">Monev</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen3">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'produk' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/produk">Produk</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'pelanggan' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/pelanggan">
                                Pelanggan
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'pemasaran' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/pemasaran">Pemasaran</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'operasional' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/operasional">Operasional</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'finansial' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/finansial">Finansial</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 {{ isset($state) && $state == 'kendala' ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="{{ route('user.monev') }}/kendala">Kendala</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                @if($title == 'upload_file')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ $title == 'upload_file' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('user.upload_file') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    <span class="ml-4">Upload File</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if($title == 'buku_kas')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ $title == 'buku_kas' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('user.buku_kas') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="ml-4">Buku Kas</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if($title == 'prestasi')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ $title == 'prestasi' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('user.prestasi') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    <span class="ml-4">Prestasi</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @if($title == 'kelulusan')
                    <span class="absolute inset-y-0 left-0 w-1 bg-lightBlue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold {{ $title == 'kelulusan' ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('user.kelulusan') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    <span class="ml-4">Kelulusan</span>
                </a>
            </li>
        </ul>
        <div class="px-6 my-6">
            <button @click="openModal"
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                Logout
                <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                    </path>
                </svg>
                {{-- <span class="ml-2" aria-hidden="true"><i class="fas fa-door-open"></i></span> --}}
            </button>
        </div>
    </div>
</aside>
@extends('template.tenant.master')

@section('title', 'Profil Usaha')

@section('body')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('template.tenant.sidebar.desktop')
        @include('template.tenant.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('template.tenant.topbar')
            {{-- Content --}}
            <main class="h-full overflow-y-auto">
                
                @include('template.tenant.notification')
                
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Profil -> Usaha
                    </h2>
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}
                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="col-span-6 sm:col-span-4">
                                    <div class="mt-1 flex items-center">
                                    <span class="inline-block h-28 w-28 rounded-md overflow-hidden bg-gray-100">
                                        <img src="{{ asset('/assets/img/tenant') }}/sample.jfif" alt="">
                                    </span>
                                    {{-- <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Change
                                    </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2 animate__animated" id="form_regis">
                                <form action="/tenant/updateProfileUsaha" method="POST" id="formUpdateUsaha">
                                    @csrf
                                    <input type="text" name="id_detail" value="{{ $usaha->getKey() }}" hidden>
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="status"
                                                        class="block text-sm font-medium text-gray-700">Status</label>
                                                    <select id="status" name="status" disabled
                                                        class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="{{ $usaha->status }}" disabled selected>{{ $usaha->statuses->jenis_status }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            @if($usaha->prodi)
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="status"
                                                        class="block text-sm font-medium text-gray-700">Prodi</label>
                                                    <select id="status" name="status" 
                                                        class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="{{ $usaha->prodi }}" selected>{{ $usaha->prodis->nama_prodi }}</option>
                                                        @for ($i = 0; $i < count($prodi); $i++)
                                                            @if ($prodi[$i]['id_prodi'] !== $usaha->prodi)
                                                                <option value="{{ $prodi[$i]['id_prodi'] }}">{{ $prodi[$i]['nama_prodi'] }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            @endif
            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori
                                                        Usaha</label>
                                                    <select id="kategori" name="kategori"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="{{ $usaha->kategori }}" selected>{{ $usaha->kategoris->nama_kategori }}</option>
                                                        @for ($i = 0; $i < count($kategori); $i++)
                                                            @if ($kategori[$i]['id_kategori'] !== $usaha->kategori)
                                                                <option value="{{ $kategori[$i]['id_kategori'] }}">{{ $kategori[$i]['nama_kategori'] }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="nama_brand" class="block text-sm font-medium text-gray-700">Nama Brand /
                                                    Usaha</label>
                                                <input required type="text" name="nama_brand" id="nama_brand"
                                                    placeholder="Contoh: Aftermeet Academy"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $usaha->nama_brand }}">
                                            </div>
            
                                            <div>
                                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">
                                                    Deskripsi Usaha
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="deskripsi" name="deskripsi" rows="5"
                                                        class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="Deskripsikan Usaha / Produk / Layanan Usaha Anda">{{ $usaha->deskripsi }}</textarea>
                                                </div>
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                                <input required type="text" name="alamat" id="alamat"
                                                    placeholder="Masukkan Alamat Usaha Anda"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $usaha->alamat }}">
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="nama_ketua" class="block text-sm font-medium text-gray-700">Nama
                                                    Ketua</label>
                                                <input required type="text" name="nama_ketua" id="nama_ketua"
                                                    placeholder="Masukkan Nama Lengkap Ketua Usaha / Tim"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $usaha->nama_ketua }}">
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="no_whatsapp" class="block text-sm font-medium text-gray-700">Nomor
                                                    WhatsApp</label>
                                                <input required type="text" name="no_whatsapp" id="no_whatsapp"
                                                    placeholder="Masukkan Nomor WhatsApp Ketua Usaha / Tim"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $usaha->no_whatsapp }}">
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="website" class="block text-sm font-medium text-gray-700">
                                                    Website
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <span
                                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                        https://
                                                    </span>
                                                    <input type="text" name="website" id="website"
                                                        class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="www.example.com"
                                                        value="{{ $usaha->website }}">
                                                </div>
                                                <p class="text-xs italic md ml-2 text-gray-300">
                                                    opsional
                                                </p>
                                            </div>
            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="instagram"
                                                    class="block text-sm font-medium text-gray-700">Instagram</label>
                                                <input type="text" name="instagram" id="instagram"
                                                    placeholder="Masukkan Username Instagram Usaha (Kosongkan Jika Tidak Ada)"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $usaha->instagram }}">
                                                <p class="text-xs italic md ml-2 text-gray-300">
                                                    opsional
                                                </p>
                                            </div>
            
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="button" id="btn-continue" @click="openModalConfirm"
                                                class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div>
            </main>
            {{-- End of Content --}}
        </div>
    </div>
</body>

    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalConfirmOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalConfirmOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="closeModalConfirm"
            @keydown.escape="closeModalConfirm"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModalConfirm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Konfirmasi
                </p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    Simpan perubahan ?
                </p>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModalConfirm"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Batal
                </button>
                <button type="button" id="btn_submit" onclick="submit()"
                    class="w-full text-center px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lightBlue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:shadow-outline-lightBlue">
                    Simpan
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->

@include('template.tenant.modalLogout')

@endsection

@section('script')

<script>
function submit() {
    $('#formUpdateUsaha').submit();
}

</script>

</html>
@endsection

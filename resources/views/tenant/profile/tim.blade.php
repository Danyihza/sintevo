@extends('template.tenant.master')

@section('title', 'Profil Tim')

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
                            Profil -> Tim
                        </h2>
                        <!-- CTA -->
                        {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}
                        <div class="flex justify-between mb-2">
                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                href="{{ route('user.exporttim') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path
                                                d="M43,14.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v35.83333h-7.16667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v35.83333c0,7.91917 6.41417,14.33333 14.33333,14.33333h7.16667v14.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-14.33333h71.66667v-21.5c0,-3.956 3.21067,-7.16667 7.16667,-7.16667h21.5v-50.16667l-35.83333,-35.83333zM43,28.66667h57.33333v28.66667h28.66667v7.16667h-86zM21.68197,78.83333h8.94434l5.19303,12.30371l5.20703,-12.30371h8.93034l-9.08431,17.7627l9.29427,18.07064h-9.04232l-5.30501,-12.52767l-5.27702,12.52767h-9.04232l9.28027,-18.07064zM57.33333,78.83333h7.16667v28.66667h14.33333v7.16667h-21.5zM96.68001,78.83333c10.19817,0.29383 10.81999,9.19416 10.81999,10.77799h-6.94271c0.00072,-0.75797 0.1117,-4.99707 -4.00326,-4.99707c-1.25417,0 -4.06428,0.55575 -3.84928,4.01725c0.20783,3.1605 4.38421,4.66706 5.15104,5.01106c1.60533,0.58767 9.55171,4.12789 9.61621,11.35189c0.01433,1.53367 -0.38218,9.5647 -10.65202,9.6722c-11.17283,0.12183 -11.92578,-9.4927 -11.92578,-11.47786h6.9847c0,1.0535 0.08925,6.14709 4.94109,5.75293c2.91683,-0.24367 3.55298,-2.34294 3.65332,-3.90527c0.16483,-2.63017 -2.3454,-4.21131 -4.99707,-5.48698c-3.72667,-1.79167 -9.62069,-3.99362 -9.72819,-10.97396c-0.09317,-6.28517 4.52496,-9.92135 10.93196,-9.74219zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span>Export Excel</span>
                            </a>
                            <button @click="openModalTim" class="flex self-end items-center justify-between w-44 px-4 py-2 text-sm font-medium leading-6 text-white transition-colors duration-150 bg-lightBlue-600 border border-transparent rounded-lg active:bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:shadow-outline-lightBlue">
                                Tambah Anggota
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>

                            </button>
                        </div>

                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table id="datatable" class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3 text-left">No</th>
                                            <th class="px-4 py-3 text-left">Nama Lengkap</th>
                                            <th class="px-4 py-3 text-left">Status</th>
                                            <th class="px-4 py-3 text-left">NRP/NIDN/NIP</th>
                                            <th class="px-4 py-3 text-left">Jabatan</th>
                                            <th class="px-4 py-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @foreach($tim->belongAnggota as $key => $anggota)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                {{ $key+1 }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    {{-- <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div> --}}
                                                    <div>
                                                        <p class="font-semibold">{{ $anggota->nama }}</p>
                                                        @if ($anggota->prodi)
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $anggota->hasProdi->nama_prodi }}
                                                        </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm ">
                                                {{ $anggota->hasStatus->jenis_status }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $anggota->no_identify }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $anggota->jabatan }}
                                            </td>
                                            <td align="center" class="px-4 py-3 text-sm">
                                                <a class="self-center" id="edit-button" href="javascript:void(0)" @click="openModalTimEdit" onclick="loadModalEdit({{ $anggota->id_anggota }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FFCC00">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <br>
                                                <a id="delete-button" href="javascript:void(0)" @click="openModalTimDelete" onclick="setDataId({{ $anggota->id_anggota }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FF0000">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                {{-- End of Content --}}
            </div>
        </div>
    </body>

    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalTimOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center overflow-auto">
        <!-- Modal -->
        <div x-show="isModalTimOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="closeModalTim"
            @keydown.escape="closeModalTim"
            class="w-full px-6 py-4 bg-white rounded-t-lg my-2 dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModalTim">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>

            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Tambah Anggota
                </p>
                <div class="mt-5 md:col-span-2" id="form_regis">
                    <form action="{{ route('user.tambahAnggota') }}" method="POST" id="formTambahAnggota">
                        <input type="hidden" name="id_user" value="{{ session('login-data')['id'] }}">
                        @csrf
                        <div class="sm:rounded-md">
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="nama"
                                        class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama"
                                        placeholder="Masukan Nama Lengkap"
                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        >
                                </div>
                            </div>
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="status" name="status" oninput="checkStatus(this)"
                                        class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                        @foreach($status as $sts)
                                            <option value="{{ $sts->id_status }}">{{ $sts->jenis_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="isMahasiswa" id="isMahasiswa" value="true">
                            <div id="select_prodi" class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="prodi"
                                        class="block text-sm font-medium text-gray-700">Prodi</label>
                                    <select id="prodi" name="prodi"
                                        class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                        @foreach($prodi as $prd)
                                            <option value="{{ $prd->id_prodi }}">{{ $prd->nama_prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="no_identify"
                                        class="block text-sm font-medium text-gray-700">NRP/NIDN/NIP</label>
                                    <input type="text" name="no_identify" id="no_identify"
                                        placeholder="Masukan NRP/NIDN/NIP (Ketik '0' jika tidak memiliki)"
                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        >
                                </div>
                            </div>
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="jabatan"
                                        class="block text-sm font-medium text-gray-700">Jabatan</label>
                                    <input type="text" name="jabatan" id="jabatan"
                                        placeholder="Masukan Jabatan"
                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button type="submit"
                class="w-full text-center px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lightBlue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:shadow-outline-lightBlue">
                Tambah
            </button>
        </form>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->

    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalTimDeleteOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalTimDeleteOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="closeModalTimDelete"
            @keydown.escape="closeModalTimDelete"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModalTimDelete">
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
                    Aksi ini akan mengakibatkan data terhapus permanen, lanjutkan ?
                </p>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModalTimDelete"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Batal
                </button>
                <button data-id="" type="button" id="btn-delete-tim" onclick="goTo('{{ route('user.deleteAnggota') . '/' }}', this.getAttribute('data-id'))"
                    class="w-full text-center px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    Lanjutkan
                </button>
            </footer>
        </div>
    </div>
    <!-- End of modal backdrop -->

    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div x-show="isModalTimEditOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center overflow-auto">
        <!-- Modal -->
        <div x-show="isModalTimEditOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
            @keydown.escape="closeModalTimEdit"
            class="w-full px-6 py-4 bg-white rounded-t-lg my-2 dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModalTimEdit">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>

            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit Data Anggota
                </p>
                <div class="mt-5 md:col-span-2" id="form_regis">
                    <form action="{{ route('user.updateAnggota') }}" method="POST" id="formEditAnggota">
                        {{-- Generate By JavaScript --}}
                    </form>
                </div>
            </div>

            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button type="button" id="btn_submit" onclick="submit('formEditAnggota')"
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
        tippy('#edit-button', {
            content: 'Edit'
        });

        tippy('#delete-button', {
            content: 'Delete'
        });
    </script>

    <script>
        function submit(form){
            $(`#${form}`).submit();
        }

        function checkStatus(element){
            const status = $(element).val();
            if (status == 2) {
                $('#select_prodi').removeClass('hidden');
                $('#isMahasiswa').val(true);
            } else {
                $('#select_prodi').addClass('hidden');
                $('#isMahasiswa').val(false);
            }
        }

        function checkStatus_edit(element){
            const status = $(element).val();
            if (status == 2) {
                $('#select_prodi_edit').removeClass('hidden');
                $('#isMahasiswa_edit').val(true);
            } else {
                $('#select_prodi_edit').addClass('hidden');
                $('#isMahasiswa_edit').val(false);
            }
        }

        function setDataId(param) {
            $('#btn-delete-tim').attr('data-id', param)
        }

        function goTo(url, params) {
            const go = url + params;
            window.location = go;
        }

        async function loadModalEdit(id_anggota) {
            const data = await fetch(`{{ route("getDetailAnggota") }}/${id_anggota}`, {
                method: 'post'
            })
            .then(response => response)
            .then(result => result.json());
            const prodi = await fetch(`{{ route("getProdi") }}`, {
                method: 'post'
            })
            .then(response => response)
            .then(result => result.json());
            const status = await fetch(`{{ route("getStatus") }}`, {
                method: 'post'
            })
            .then(response => response)
            .then(result => result.json());
            let form = `
                        <input type="hidden" name="id_anggota" value="${data.id_anggota}">
                        @csrf
                        <div class="sm:rounded-md">
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="nama"
                                        class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama_edit"
                                        placeholder="Masukan Nama Lengkap"
                                        value="${data.nama}"
                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        >
                                </div>
                            </div>
                            <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status_edit" name="status" oninput="checkStatus_edit(this)"
                                class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                <option value="${data.status}">${data.has_status.jenis_status}</option>
                                `;
            status.forEach((item,index) => {
                if (item.id_status != data.status) {
                    form += `<option value="${item.id_status}">${item.jenis_status}</option>`
                }
            })
            form += `
                        </select>
                            </div>
                        </div>
                        `;
            form += `
                        <input type="hidden" name="isMahasiswa" id="isMahasiswa_edit" value="${data.has_prodi? 'true' : 'false'}">
                        <div id="select_prodi_edit" class="px-4 bg-white md:space-y-1 sm:py-1 ${data.has_prodi? '' : 'hidden'}">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="prodi"
                                    class="block text-sm font-medium text-gray-700">Prodi</label>
                                    `;
            form += `
                                <select id="prodi_edit" name="prodi"
                                    class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">`;

                // form += `<option value="${data.has_prodi ?? 'NaN'}" ${data.has_prodi ? '': 'disabled'}>${data.has_prodi ? data.has_prodi.nama_prodi : 'Pilih Prodi'}</option>`;

            prodi.forEach((item, index) => {
                    form += `<option value="${item.id_prodi}" ${ item.id_prodi == data.has_prodi?.id_prodi ? 'selected' : ''}>${item.nama_prodi}</option>`;
            })

            form += `
                </select>
                </div>
            </div>
            `;

            form += `
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="no_identify"
                                    class="block text-sm font-medium text-gray-700">NRP/NIDN/NIP</label>
                                <input type="text" name="no_identify" id="no_identify_edit"
                                    placeholder="Masukan NRP/NIDN/NIP (Ketik '0' jika tidak memiliki)"
                                    value="${data.no_identify}"
                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="jabatan"
                                    class="block text-sm font-medium text-gray-700">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan_edit"
                                    placeholder="Masukan Jabatan"
                                    value="${data.jabatan}"
                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                            </div>
                        </div>
                    </div>
            `;
            $('#formEditAnggota').html(form);
        }

    </script>

    </html>
@endsection

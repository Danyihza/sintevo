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
                    <div class="flex justify-between">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Profil -> Usaha
                        </h2>
                        <div class="my-auto">
                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                href="{{ route('export.profileUsaha', session('login-data')['id']) }}"
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="24" height="24"
                                    viewBox="0 0 172 172"
                                    style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M43,14.33333c-7.90483,0 -14.33333,6.4285 -14.33333,14.33333v114.66667c0,7.90483 6.4285,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-114.66667h50.16667v35.83333h35.83333v35.83333h14.33333v-43l-43,-43zM84.79622,64.5c-3.94167,0 -6.89411,2.6763 -7.47461,7.33464c-0.57333,4.65117 1.73243,12.78454 5.75293,20.33821c-1.72717,5.23167 -3.45243,9.87813 -5.75293,14.5293c-7.47483,2.322 -14.37095,5.8041 -17.24479,9.29427c-4.59383,5.2245 -2.29445,8.71455 -1.14779,10.45605c1.15383,1.7415 2.87854,2.54753 5.17904,2.54753c1.15383,0 2.30352,-0.23135 3.45736,-0.81185c4.601,-1.7415 9.18644,-8.7187 13.78743,-16.85287c4.02051,-1.161 8.04526,-2.31696 12.06576,-2.89746c4.0205,4.644 8.05869,7.55938 11.50586,8.72038c4.0205,1.161 7.46912,-0.59046 9.19629,-4.66113c1.14667,-3.49017 0.56426,-6.38382 -2.30957,-8.13249c-3.45433,-2.322 -9.20267,-2.33018 -16.097,-1.74968c-2.3005,-3.483 -4.58566,-6.96589 -6.31283,-10.45605c2.87383,-8.71467 4.01614,-16.26094 2.86947,-20.91211c-1.15383,-4.07067 -3.53294,-6.74674 -7.47461,-6.74674zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z"></path></g>
                                    </g>
                                </svg>
                                <span>Export PDF</span>
                            </a>
                        </div>
                    </div>  
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}
                        


                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{ route('user.updateProfileUsaha') }}" method="POST" id="formUpdateUsaha" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id_detail" value="{{ $usaha->getKey() }}" hidden>
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                            <label for="status"
                                                class="block text-sm font-medium text-gray-700">Gambar Tenant</label>
                                            <div class="flex justify-start gap-3">
                                                <div class="md:col-span-2">
                                                    <div class="col-span-6 sm:col-span-4">
                                                            <div class=" flex items-center ">
                                                                <span class="inline-block h-28 w-28 rounded-md overflow-hidden bg-gray-100">
                                                                    <img class="object-cover w-full h-full" src="{{ asset('/assets/img/tenant') }}/{{ $usaha->gambar }}" alt="" id="imagePreview">
                                                                </span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <div class="bg-lightBlue-100 p-6 border border-lightBlue-700 rounded-md max-w-lg">
                                                        <div class="mb-4">
                                                            <span class="text-sm text-lightBlue-700">
                                                                Sangat direkomendasikan menggunakan gambar dengan rasio 1:1
                                                                <br>
                                                                File type: PNG, JPG, JPEG. Max file size: 10 mb
                                                            </span>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <label class="cursor-pointer">
                                                                <input type="file" class="hidden" accept=".jpg, .png, .jpeg" name="picture" oninput="onUpload(this)">
                                                                <span class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                                    Edit Logo
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

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
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                <input required type="text" name="email" id="email"
                                                    placeholder="Masukkan Email"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    value="{{ $user->email }}">
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
                                                    placeholder="Masukkan Username Instagram Usaha (Kosongkan Jika Tidak Ada) @example"
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
let submitform = false;
window.onbeforeunload = function(){
    if (submitform) {
        return undefined
    }
    return 'Are you sure you want to leave?';
};

function submit() {
    submitform = true;
    $('#formUpdateUsaha').submit();
}

function onUpload(element){
    const [file] = element.files;
    if (file) {
        const image = document.getElementById('imagePreview');
        image.src = URL.createObjectURL(file);
    }
}

</script>

</html>
@endsection

@extends('template.admin.master')

@section('title', 'Admin')

@section('body')

@php
$url = explode('/', url()->current());
$id_user = end($url);
@endphp

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('template.admin.sidebar.desktop')
        @include('template.admin.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('template.admin.topbar')
            {{-- Content --}}
            <main class="h-full overflow-y-auto pb-10">
                @include('template.tenant.notification')
                <div class="container px-6 pt-10 mx-auto grid">
                    <div class="flex justify-between">
                        <a href="{{ route('admin.listTenants') }}"
                            class="flex flex-row flex-wrap w-max text-lightBlue-700 rounded-md p-1 hover:bg-lightBlue-100 active:bg-lightBlue-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"
                                fill="currentColor">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z" />
                            </svg>
                            <span class="ml-1 text-md">Back to all tenants</span>
                        </a>
                        <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            href="{{ route('export.allDataTenant', $id_user) }}"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="24" height="24"
                                viewBox="0 0 172 172"
                                style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M43,14.33333c-7.90483,0 -14.33333,6.4285 -14.33333,14.33333v114.66667c0,7.90483 6.4285,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-114.66667h50.16667v35.83333h35.83333v35.83333h14.33333v-43l-43,-43zM84.79622,64.5c-3.94167,0 -6.89411,2.6763 -7.47461,7.33464c-0.57333,4.65117 1.73243,12.78454 5.75293,20.33821c-1.72717,5.23167 -3.45243,9.87813 -5.75293,14.5293c-7.47483,2.322 -14.37095,5.8041 -17.24479,9.29427c-4.59383,5.2245 -2.29445,8.71455 -1.14779,10.45605c1.15383,1.7415 2.87854,2.54753 5.17904,2.54753c1.15383,0 2.30352,-0.23135 3.45736,-0.81185c4.601,-1.7415 9.18644,-8.7187 13.78743,-16.85287c4.02051,-1.161 8.04526,-2.31696 12.06576,-2.89746c4.0205,4.644 8.05869,7.55938 11.50586,8.72038c4.0205,1.161 7.46912,-0.59046 9.19629,-4.66113c1.14667,-3.49017 0.56426,-6.38382 -2.30957,-8.13249c-3.45433,-2.322 -9.20267,-2.33018 -16.097,-1.74968c-2.3005,-3.483 -4.58566,-6.96589 -6.31283,-10.45605c2.87383,-8.71467 4.01614,-16.26094 2.86947,-20.91211c-1.15383,-4.07067 -3.53294,-6.74674 -7.47461,-6.74674zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z"></path></g>
                                </g>
                            </svg>
                            <span>Export PDF Data Tenant</span>
                        </a>
                    </div>


                    <div class="flex mt-10 flex-row">
                        <div class="">
                            <span class="inline-block h-16 w-16 rounded-lg overflow-hidden bg-gray-100 shadow-md">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="M22 20v2H2v-2h1v-6.758A4.496 4.496 0 0 1 1 9.5c0-.827.224-1.624.633-2.303L4.345 2.5a1 1 0 0 1 .866-.5H18.79a1 1 0 0 1 .866.5l2.702 4.682A4.496 4.496 0 0 1 21 13.242V20h1zM5.789 4L3.356 8.213a2.5 2.5 0 0 0 4.466 2.216c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 0 0 4.644 0c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 1 0 4.457-2.232L18.21 4H5.79z" fill="rgba(38,132,199,1)"/></svg> --}}
                                <img class="object-cover w-full h-full"
                                    src="{{ asset('/assets/img/tenant') }}/{{ $tim->hasDetail->gambar }}" alt="">
                            </span>
                        </div>
                        <div class="mb-auto mt-auto ml-4">
                            <h1 class="text-2xl font-bold">{{ $tim->hasDetail->nama_brand }}</h1>
                            <div class="flex flex-row">
                                <span class="text-normal">{{ $tim->hasDetail->kategoris->nama_kategori }}</span>
                                @if($tim->hasDetail->instagram || $tim->hasDetail->website)
                                <span class="ml-1">-</span>
                                @if($tim->hasDetail->instagram)
                                <a href="https://www.instagram.com/{{ str_replace('@','', $tim->hasDetail->instagram) }}"
                                    class="ml-0 flex flex-row rounded-full p-1 text-lightBlue-700 hover:bg-lightBlue-100"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        width="16" height="16">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z" />
                                    </svg>
                                    <span class="ml-1 text-xs">Instagram</span>
                                </a>
                                @endif
                                @if($tim->hasDetail->website)
                                <a href="https://{{ $tim->hasDetail->website }}"
                                    class="ml-0 flex flex-row rounded-full p-1 text-lightBlue-700 hover:bg-lightBlue-100"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        width="16" height="16">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-2.29-2.333A17.9 17.9 0 0 1 8.027 13H4.062a8.008 8.008 0 0 0 5.648 6.667zM10.03 13c.151 2.439.848 4.73 1.97 6.752A15.905 15.905 0 0 0 13.97 13h-3.94zm9.908 0h-3.965a17.9 17.9 0 0 1-1.683 6.667A8.008 8.008 0 0 0 19.938 13zM4.062 11h3.965A17.9 17.9 0 0 1 9.71 4.333 8.008 8.008 0 0 0 4.062 11zm5.969 0h3.938A15.905 15.905 0 0 0 12 4.248 15.905 15.905 0 0 0 10.03 11zm4.259-6.667A17.9 17.9 0 0 1 15.973 11h3.965a8.008 8.008 0 0 0-5.648-6.667z" />
                                    </svg>
                                    <span class="ml-1 text-xs">Website</span>
                                </a>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="">

                        <h1 class="font-medium pt-10 pb-4">Profil</h1>
                        <div class="bg-white border border-gray-200" x-data="{selected:1}">
                            <ul class="shadow-box">

                                <li class="relative border-b border-gray-200">

                                    
                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 1 ? selected = 1 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>Profil Usaha</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container1"
                                        x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                        <div class="p-1">
                                            <div class="px-4 bg-white space-y-6 sm:p-6">
                                                <div class="flex justify-end">
                                                    <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                        href="{{ route('export.profileUsaha', $id_user) }}"
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
                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="status"
                                                            class="block text-sm font-medium text-gray-700">Status</label>
                                                        <select id="status" name="status" disabled
                                                            class="mt-1 block w-full py-2 disabled px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                            <option value="{{ $usaha->status }}" disabled selected>
                                                                {{ $usaha->statuses->jenis_status }}</option>
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
                                                            <option value="{{ $usaha->prodi }}" selected>
                                                                {{ $usaha->prodis->nama_prodi }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="kategori"
                                                            class="block text-sm font-medium text-gray-700">Kategori
                                                            Usaha</label>
                                                        <select id="kategori" name="kategori" disabled
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                            <option value="{{ $usaha->kategori }}" selected>
                                                                {{ $usaha->kategoris->nama_kategori }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="nama_brand"
                                                        class="block text-sm font-medium text-gray-700">Nama Brand /
                                                        Usaha</label>
                                                    <input required type="text" name="nama_brand" id="nama_brand"
                                                        placeholder="Contoh: Aftermeet Academy"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $usaha->nama_brand }}" readonly>
                                                </div>

                                                <div>
                                                    <label for="deskripsi"
                                                        class="block text-sm font-medium text-gray-700">
                                                        Deskripsi Usaha
                                                    </label>
                                                    <div class="mt-1">
                                                        <textarea id="deskripsi" name="deskripsi" rows="5" readonly
                                                            class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                            placeholder="Deskripsikan Usaha / Produk / Layanan Usaha Anda">{{ $usaha->deskripsi }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="alamat"
                                                        class="block text-sm font-medium text-gray-700">Alamat</label>
                                                    <input required type="text" name="alamat" id="alamat"
                                                        placeholder="Masukkan Alamat Usaha Anda"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $usaha->alamat }}" readonly>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="nama_ketua"
                                                        class="block text-sm font-medium text-gray-700">Nama
                                                        Ketua</label>
                                                    <input required type="text" name="nama_ketua" id="nama_ketua"
                                                        placeholder="Masukkan Nama Lengkap Ketua Usaha / Tim"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $usaha->nama_ketua }}" readonly>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="no_whatsapp"
                                                        class="block text-sm font-medium text-gray-700">Nomor
                                                        WhatsApp</label>
                                                    <input required type="text" name="no_whatsapp" id="no_whatsapp"
                                                        placeholder="Masukkan Nomor WhatsApp Ketua Usaha / Tim"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $usaha->no_whatsapp }}" readonly>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                    <input required type="text" name="email" id="email"
                                                        placeholder="Masukkan Email"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $tim->email }}" readonly>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="website"
                                                        class="block text-sm font-medium text-gray-700">
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
                                                            value="{{ $usaha->website ?? '-' }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="instagram"
                                                        class="block text-sm font-medium text-gray-700">Instagram</label>
                                                    <input type="text" name="instagram" id="instagram"
                                                        placeholder="Masukkan Username Instagram Usaha (Kosongkan Jika Tidak Ada)"
                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                        value="{{ $usaha->instagram ?? '-'}}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                </li>


                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 2 ? selected = 2 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Profil Tim
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" />
                                            </svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container2"
                                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <!-- New Table -->
                                            <div class="flex justify-end mb-3">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.exporttim', $id_user) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3 text-left">No</th>
                                                                <th class="px-4 py-3 text-left">Nama Lengkap</th>
                                                                <th class="px-4 py-3 text-left">Status</th>
                                                                <th class="px-4 py-3 text-left">NRP/NIDN/NIP</th>
                                                                <th class="px-4 py-3 text-left">Jabatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @foreach($tim->belongAnggota as $key => $anggota)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ $key+1 }}
                                                                </td>
                                                                <td class="px-4 py-3">
                                                                    <div class="flex items-center text-sm">
                                                                        <div>
                                                                            <p class="font-semibold">
                                                                                {{ $anggota->nama }}</p>
                                                                            @if ($anggota->prodi)
                                                                            <p
                                                                                class="text-xs text-gray-600 dark:text-gray-400">
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
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                            </ul>
                        </div>
                    </div>

                    <div class="">

                        <h1 class="font-medium pt-10 pb-4">Monev</h1>
                        <div class="bg-white border border-gray-200" x-data="{selected:null}">
                            <ul class="shadow-box">

                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 1 ? selected = 1 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Produk</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container1"
                                        x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'produk', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal</th>
                                                                <th class="px-4 py-3">Status Progress</th>
                                                                <th class="px-4 py-3">Uraian Progress</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @if (count($produk) == 0)
                                                            <tr>
                                                                <td class="text-center px-4 py-3" colspan="5">
                                                                    <span
                                                                        class="font-normal italic opacity-30 px-2 py-1">
                                                                        Data tidak tersedia
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @foreach($produk as $pro)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($pro->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($pro->status_progress)
                                                                    @case('Progress Melampaui')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $pro->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                        {{ $pro->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Tidak Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $pro->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch

                                                                </td>
                                                                <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                                                    {{ $pro->uraian }}
                                                                </td>
                                                                <td class="px-4 py-3 flex items-center text-sm">
                                                                    @if($pro->file)
                                                                    <a href="{{ route('download') }}?file={{ $pro->file }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $pro->hasFile->nama_file); $extention = end($get); ?>
                                                                        @switch($extention)
                                                                        @case('pdf')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.pdf')
                                                                        </div>
                                                                        @break
                                                                        @case('docx')
                                                                        @case('doc')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.word')
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.default')
                                                                        </div>
                                                                        @endswitch
                                                                    </a>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @if ($pro->feedback)
                                                                    {{ $pro->feedback }}
                                                                    @else
                                                                    <input type="text" placeholder="Masukan Feedback"
                                                                        onkeypress="submitFeedback(this)"
                                                                        data-id="{{ $pro->id_monev }}"
                                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 2 ? selected = 2 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Pelanggan
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container2"
                                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'pelanggan', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal</th>
                                                                <th class="px-4 py-3">Status Progress</th>
                                                                <th class="px-4 py-3">Uraian Progress</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @if (count($pelanggan) == 0)
                                                            <tr>
                                                                <td class="text-center px-4 py-3" colspan="5">
                                                                    <span
                                                                        class="font-normal italic opacity-30 px-2 py-1">
                                                                        Data tidak tersedia
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @foreach($pelanggan as $plg)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($plg->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($plg->status_progress)
                                                                    @case('Progress Melampaui')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $plg->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                        {{ $plg->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Tidak Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $plg->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch

                                                                </td>
                                                                <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                                                    {{ $plg->uraian }}
                                                                </td>
                                                                <td class="px-4 py-3 flex items-center text-sm">
                                                                    @if($plg->file)
                                                                    <a href="{{ route('download') }}?file={{ $plg->file }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $plg->hasFile->nama_file); $extention = end($get); ?>
                                                                        @switch($extention)
                                                                        @case('pdf')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.pdf')
                                                                        </div>
                                                                        @break
                                                                        @case('docx')
                                                                        @case('doc')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.word')
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.default')
                                                                        </div>
                                                                        @endswitch
                                                                    </a>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    @if ($plg->feedback)
                                                                    {{ $plg->feedback }}
                                                                    @else
                                                                    <input type="text" placeholder="Masukan Feedback"
                                                                        onkeypress="submitFeedback(this)"
                                                                        data-id="{{ $plg->id_monev }}"
                                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                                                    @endif
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 3 ? selected = 3 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Pemasaran</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container3"
                                        x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'pemasaran', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal</th>
                                                                <th class="px-4 py-3">Status Progress</th>
                                                                <th class="px-4 py-3">Uraian Progress</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @if (count($pemasaran) == 0)
                                                            <tr>
                                                                <td class="text-center px-4 py-3" colspan="5">
                                                                    <span
                                                                        class="font-normal italic opacity-30 px-2 py-1">
                                                                        Data tidak tersedia
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @foreach($pemasaran as $data)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($data->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($data->status_progress)
                                                                    @case('Progress Melampaui')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Tidak Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch

                                                                </td>
                                                                <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                                                    {{ $data->uraian }}
                                                                </td>
                                                                <td class="px-4 py-3 flex items-center text-sm">
                                                                    @if($data->file)
                                                                    <a href="{{ route('download') }}?file={{ $data->file }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $data->hasFile->nama_file); $extention = end($get); ?>
                                                                        @switch($extention)
                                                                        @case('pdf')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.pdf')
                                                                        </div>
                                                                        @break
                                                                        @case('docx')
                                                                        @case('doc')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.word')
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.default')
                                                                        </div>
                                                                        @endswitch
                                                                    </a>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @if ($data->feedback)
                                                                    {{ $data->feedback }}
                                                                    @else
                                                                    <input type="text" placeholder="Masukan Feedback"
                                                                        onkeypress="submitFeedback(this)"
                                                                        data-id="{{ $data->id_monev }}"
                                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 4 ? selected = 4 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Operasional
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container4"
                                        x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'operasional', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal</th>
                                                                <th class="px-4 py-3">Status Progress</th>
                                                                <th class="px-4 py-3">Uraian Progress</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @if (count($operasional) == 0)
                                                            <tr>
                                                                <td class="text-center px-4 py-3" colspan="5">
                                                                    <span
                                                                        class="font-normal italic opacity-30 px-2 py-1">
                                                                        Data tidak tersedia
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @foreach($operasional as $data)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($data->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($data->status_progress)
                                                                    @case('Progress Melampaui')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Tidak Ada Progress')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch

                                                                </td>
                                                                <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                                                    {{ $data->uraian }}
                                                                </td>
                                                                <td class="px-4 py-3 flex items-center text-sm">
                                                                    @if($data->file)
                                                                    <a href="{{ route('download') }}?file={{ $data->file }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $data->hasFile->nama_file); $extention = end($get); ?>
                                                                        @switch($extention)
                                                                        @case('pdf')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.pdf')
                                                                        </div>
                                                                        @break
                                                                        @case('docx')
                                                                        @case('doc')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.word')
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.default')
                                                                        </div>
                                                                        @endswitch
                                                                    </a>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @if ($data->feedback)
                                                                    {{ $data->feedback }}
                                                                    @else
                                                                    {{-- <span
                                                                        class="px-2 py-1 cursor-pointer font-semibold leading-tight text-gray-700 border border-gray-800 bg-yellow-200 rounded hover:bg-yellow-300 dark:bg-yellow-700 dark:text-yellow-100">
                                                                        Beri Feedback
                                                                    </span> --}}
                                                                    <input type="text" placeholder="Masukan Feedback"
                                                                        onkeypress="submitFeedback(this)"
                                                                        data-id="{{ $data->id_monev }}"
                                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 5 ? selected = 5 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Finansial
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container5"
                                        x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'finansial', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <!-- New Table -->
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal Transaksi</th>
                                                                <th class="px-4 py-3 justify-center flex">Bukti
                                                                    Transaksi</th>
                                                                <th class="px-4 py-3">Jenis Transaksi</th>
                                                                <th class="px-4 py-3">Keterangan Transaksi</th>
                                                                <th class="px-4 py-3">Jumlah</th>
                                                                {{-- <th class="px-4 py-3 justify-center flex">Aksi</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @foreach($finansial as $finan)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($finan->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 justify-center flex text-sm">
                                                                    <a data-tippy-content="Lihat Bukti"
                                                                        href="{{ route('download') }}?file={{ $finan->file }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path
                                                                                d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"
                                                                                fill="rgba(38,132,199,1)" /></svg>
                                                                    </a>
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($finan->jenis_transaksi)
                                                                    @case('Pendapatan')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $finan->jenis_transaksi }}
                                                                    </span>
                                                                    @break
                                                                    @case('Pengeluaran')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $finan->jenis_transaksi }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch
                                                                </td>
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ $finan->keterangan_transaksi }}
                                                                </td>
                                                                <td id="jumlah_data" class="px-4 py-3 text-md">
                                                                    {{ $finan->jumlah }}
                                                                </td>
                                                                {{-- <td
                                                                    class="flex flex-row px-4 justify-center py-3 text-sm">
                                                                    <a data-tippy-content="Edit" class="mr-2"
                                                                        id="edit-button" href="javascript:void(0)"
                                                                        @click="openModalTimEdit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path
                                                                                d="M6.414 16L16.556 5.858l-1.414-1.414L5 14.586V16h1.414zm.829 2H3v-4.243L14.435 2.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 18zM3 20h18v2H3v-2z"
                                                                                fill="rgba(255,204,0,1)" /></svg>
                                                                    </a>
                                                                    <a data-tippy-content="Hapus" class="ml-2"
                                                                        id="delete-button" href="javascript:void(0)"
                                                                        @click="openModalTimDelete">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path
                                                                                d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z"
                                                                                fill="rgba(255,0,0,1)" /></svg>
                                                                    </a>
                                                                </td> --}}
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 6 ? selected = 6 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Kendala
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container6"
                                        x-bind:style="selected == 6 ? 'max-height: ' + $refs.container6.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <div class="flex justify-end mb-5">
                                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    href="{{ route('admin.export', ['jenis_monev' => 'kendala', 'id_user' => $id_user]) }}">
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
                                            </div>
                                            <div class="w-full overflow-hidden rounded-sm border mb-6">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Tanggal</th>
                                                                <th class="px-4 py-3">Status Progress</th>
                                                                <th class="px-4 py-3">Uraian Progress</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @if (count($kendala) == 0)
                                                            <tr>
                                                                <td class="text-center px-4 py-3" colspan="5">
                                                                    <span
                                                                        class="font-normal italic opacity-30 px-2 py-1">
                                                                        Data tidak tersedia
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @foreach($kendala as $data)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ date('d/m/Y', strtotime($data->tanggal)) }}
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @switch($data->status_progress)
                                                                    @case('Ringan')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Sedang')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @case('Berat')
                                                                    <span
                                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                                        {{ $data->status_progress }}
                                                                    </span>
                                                                    @break
                                                                    @default

                                                                    @endswitch

                                                                </td>
                                                                <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                                                    {{ $data->uraian }}
                                                                </td>
                                                                <td class="px-4 py-3 flex items-center text-sm">
                                                                    @if($data->file)
                                                                    <a href="{{ route('download') }}?file={{ $data->file }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $data->hasFile->nama_file); $extention = end($get); ?>
                                                                        @switch($extention)
                                                                        @case('pdf')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.pdf')
                                                                        </div>
                                                                        @break
                                                                        @case('docx')
                                                                        @case('doc')
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.word')
                                                                        </div>
                                                                        @break
                                                                        @default
                                                                        <div
                                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                                            @include('template.tenant.assets.icon.default')
                                                                        </div>
                                                                        @endswitch
                                                                    </a>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-3 text-xs">
                                                                    @if ($data->feedback)
                                                                    {{ $data->feedback }}
                                                                    @else
                                                                    {{-- <span
                                                                        class="px-2 py-1 cursor-pointer font-semibold leading-tight text-gray-700 border border-gray-800 bg-yellow-200 rounded hover:bg-yellow-300 dark:bg-yellow-700 dark:text-yellow-100">
                                                                        Beri Feedback
                                                                    </span> --}}
                                                                    <input type="text" placeholder="Masukan Feedback"
                                                                        onkeypress="submitFeedback(this)"
                                                                        data-id="{{ $data->id_monev }}"
                                                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="my-5 md:grid md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">Buku Kas</h1>
                            <div class="border border-gray-300 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex justify-between">
                                        <h1 class="text-lg">Kas</h1>
                                        <div>
                                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                href="{{ route('export.bukuKas', $id_user) }}"
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
                                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                href="{{ route('admin.export', ['jenis_monev' => 'kas', 'id_user' => $id_user]) }}">
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
                                        </div>
                                    </div>
                                    <div class="w-full overflow-hidden rounded-sm border mb-6">
                                        <div class="w-full overflow-x-auto">
                                            <table class="w-full whitespace-no-wrap ">
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold text-center tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="pr-4 py-3">Tanggal Transaksi</th>
                                                        <th class="px-4 py-3">Bukti Transaksi</th>
                                                        <th class="px-4 py-3">Keterangan Transaksi</th>
                                                        <th class="px-4 py-3">Pendapatan (Rp)</th>
                                                        <th class="px-4 py-3">Pengeluaran (Rp)</th>
                                                        <th class="px-4 py-3">Saldo</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                    @if (count($buku_kas) == 0)
                                                    <tr>
                                                        <td class="text-center px-4 py-3" colspan="6">
                                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                                Data tidak tersedia
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @for($i = 0; $i <= count($buku_kas)-1; $i++)
                                                    <tr class="text-center">
                                                        <td class="py-3">
                                                            {{ date('d/m/Y', strtotime($buku_kas[$i]->tanggal)) }}
                                                        </td>
                                                        <td class="py-3 justify-center flex">
                                                            <a data-tippy-content="Lihat Bukti" href="{{ route('download') . '?file=' . $buku_kas[$i]->file }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="rgba(38,132,199,1)"/></svg>
                                                            </a>
                                                        </td>
                                                        <td class="py-3">
                                                            {{ $buku_kas[$i]->keterangan_transaksi }}
                                                        </td>
                                                        <td class="py-3">
                                                            @if ($buku_kas[$i]->jenis_transaksi == 'Pendapatan')
                                                            <span class="text-green-500 jenis">
                                                                +
                                                            </span>
                                                            <span class="text-green-500 jumlah">
                                                                {{ $buku_kas[$i]->jumlah }}
                                                            </span>
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                        <td class="py-3">
                                                            @if ($buku_kas[$i]->jenis_transaksi == 'Pengeluaran')
                                                            <span class="text-red-500 jenis">
                                                                -
                                                            </span>
                                                            <span class="text-red-500 jumlah">
                                                                {{ $buku_kas[$i]->jumlah }}
                                                            </span>
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                        <td class="py-3 jumlah" id="saldo">
                                                            {{ $saldos[$i] }}
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-5 md:grid md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">File & Lampiran</h1>
                            <div class="border border-gray-300 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex justify-between">
                                        <h1 class="text-lg">Pencatatan Inkubasi</h1>
                                        @if(count($lampiran) > 0)
                                        <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                            href="{{ route('admin.exportLampiran', $id_user) }}">
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
                                        @endif
                                    </div>
                                    <div class="w-full overflow-hidden rounded-sm border mb-6">
                                        <div class="w-full overflow-x-auto">
                                            <table class="w-full whitespace-no-wrap">
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="px-4 py-3">Tanggal</th>
                                                        <th class="px-4 py-3">Jenis Kegiatan</th>
                                                        <th class="px-4 py-3">Keterangan File</th>
                                                        <th class="px-4 py-3">File</th>
                                                        <th class="px-4 py-3">Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                    @if(count($lampiran) == 0)
                                                    <tr>
                                                        <td class="text-center px-4 py-3" colspan="5">
                                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                                Data tidak tersedia
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @foreach($lampiran as $lamp)
                                                    <tr>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ date('d/m/Y', strtotime($lamp->tanggal)) }}
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ $lamp->jenis_kegiatan }}
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ $lamp->keterangan_file }}
                                                        </td>
                                                        <td class="px-4 py-3 flex items-center text-sm">
                                                            @if($lamp->file)
                                                            <a href="{{ route('download') }}?file={{ $lamp->file }}"
                                                                target="_blank">
                                                                <?php $get = explode('.', $lamp->hasFile->nama_file); $extention = end($get); ?>
                                                                @switch($extention)
                                                                @case('pdf')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.pdf')
                                                                </div>
                                                                @break
                                                                @case('docx')
                                                                @case('doc')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.word')
                                                                </div>
                                                                @break
                                                                @case('jpg')
                                                                @case('jpeg')
                                                                @case('png')
                                                                @case('jfif')
                                                                @case('gif')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.image')
                                                                </div>
                                                                @break
                                                                @default
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.default')
                                                                </div>
                                                                @endswitch
                                                            </a>
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            @if ($lamp->feedback)
                                                            {{ $lamp->feedback }}
                                                            @else
                                                            {{-- <span
                                                                class="px-2 py-1 cursor-pointer font-semibold leading-tight text-gray-700 border border-gray-800 bg-yellow-200 rounded hover:bg-yellow-300 dark:bg-yellow-700 dark:text-yellow-100">
                                                                Beri Feedback
                                                            </span> --}}
                                                            <input type="text" placeholder="Masukan Feedback"
                                                                onkeypress="submitFeedbackFileMonev(this)"
                                                                data-id="{{ $lamp->id_filemonev }}"
                                                                class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-5 md:grid md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">Prestasi</h1>
                            <div class="border border-gray-300 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex justify-between">
                                        <h1 class="text-lg">Prestasi Tenant</h1>
                                        @if(count($prestasi) > 0)
                                        <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                            href="{{ route('admin.exportPrestasi', $id_user) }}">
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
                                        @endif
                                    </div>
                                    <div class="w-full overflow-hidden rounded-sm border mb-6">
                                        <div class="w-full overflow-x-auto">
                                            <table class="w-full whitespace-no-wrap">
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="px-4 py-3">Tanggal</th>
                                                        <th class="px-4 py-3">Kegiatan</th>
                                                        <th class="px-4 py-3">Prestasi</th>
                                                        <th class="px-4 py-3">Tingkat Prestasi</th>
                                                        <th class="px-4 py-3">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                    @if(count($prestasi) == 0)
                                                    <tr>
                                                        <td class="text-center px-4 py-3" colspan="5">
                                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                                Data tidak tersedia
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @foreach($prestasi as $p)
                                                    <tr>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ date('d/m/Y', strtotime($p->tanggal)) }}
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ $p->jenis_kegiatan }}
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ $p->prestasi }}
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{ $p->tingkat_prestasi }}
                                                        </td>
                                                        <td class="px-4 py-3 flex items-center text-sm">
                                                            @if($p->file)
                                                            <a href="{{ route('download') }}?file={{ $p->file }}"
                                                                target="_blank">
                                                                <?php $get = explode('.', $p->hasFile->nama_file); $extention = end($get); ?>
                                                                @switch($extention)
                                                                @case('pdf')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.pdf')
                                                                </div>
                                                                @break
                                                                @case('docx')
                                                                @case('doc')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.word')
                                                                </div>
                                                                @break
                                                                @case('jpg')
                                                                @case('jpeg')
                                                                @case('png')
                                                                @case('jfif')
                                                                @case('gif')
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.image')
                                                                </div>
                                                                @break
                                                                @default
                                                                <div data-tippy-content="{{ strtoupper($extention) }}">
                                                                    @include('template.tenant.assets.icon.default')
                                                                </div>
                                                                @endswitch
                                                            </a>
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 md:grid md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">Berkas & Kelulusan</h1>
                            <div class="border border-gray-300 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex flex-row w- justify-between">
                                        <h1 class="text-lg">Berkas dan Kelulusan Tenant</h1>
                                        <button @click="openModalAddSertifikat"
                                            class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500"
                                            type="button">
                                            Tambah
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="w-full overflow-hidden rounded-sm border mb-6">
                                        <div class="w-full overflow-x-auto">
                                            <table class="w-full whitespace-no-wrap">
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="px-4 py-3">Keterangan</th>
                                                        <th class="px-4 py-3">File</th>
                                                        <th class="px-4 py-3">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                    @foreach($kelulusan as $lulus)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            <div class="flex items-center text-sm">
                                                                <div
                                                                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                                    @php
                                                                    $ext = explode('.', $lulus->hasfile->nama_file);
                                                                    $extension = end($ext);
                                                                    @endphp
                                                                    @switch($extension)
                                                                    @case('pdf')
                                                                        @include('template.tenant.assets.icon.pdf')
                                                                    @break
                                                                    @case('docx')
                                                                    @case('doc')
                                                                        @include('template.tenant.assets.icon.word')
                                                                    @break
                                                                    @case('jpg')
                                                                    @case('jpeg')
                                                                    @case('png')
                                                                    @case('jfif')
                                                                    @case('gif')
                                                                        @include('template.tenant.assets.icon.image')
                                                                    @break
                                                                    @default
                                                                        @include('template.tenant.assets.icon.default')
                                                                    @endswitch
                                                                </div>
                                                                <div>
                                                                    <p class="font-semibold">
                                                                        {{ $lulus->kelulusan }}
                                                                    </p>
                                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                        {{ strtoupper($extension) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-3 text-xs">
                                                            <a href="{{ route('download') }}?file={{ $lulus->file }}"
                                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                                                Download
                                                            </a>
                                                        </td>
                                                        <td class="px-4 py-3 text-xs">
                                                            <a href="{{ route('admin.removeSertifikat', $lulus->id_kelulusan) }}"
                                                                onclick="return confirm('Apakah anda yakin ?')"
                                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                                                                Hapus
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 md:grid md:gap-6 mb-8">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">Pengaturan Akun</h1>
                            <div class="sm:rounded-md border border-lightBlue-500 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex justify-between">
                                        <div class="left">
                                            <div class="font-normal">
                                                Ganti Password
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a href="{{ route('admin.changePasswordView', $usaha->id_detail) }}"
                                                class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-lightBlue-500 hover:text-white-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                Ganti Password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 md:grid md:gap-6 mb-8">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <h1 class="font-medium pb-4">Danger Zone</h1>
                            <div class="sm:rounded-md border border-red-500 sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="flex justify-between">
                                        <div class="left">
                                            <div class="font-normal">
                                                Hapus tenant ini
                                            </div>
                                            <div class="font-light">
                                                Hal ini akan membuat seluruh data tenant terhapus dan tidak bisa di
                                                kembalikan
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a href="{{ route('admin.hapusTenant', $usaha->id_detail) }}"
                                                onclick="return confirm('Apakah anda yakin ?')"
                                                class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-red-500 hover:text-white-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Hapus tenant ini
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            {{-- End of Content --}}
        </div>
    </div>
</body>

<!-- Modal backdrop. This what you want to place close to the closing body tag -->
<div x-show="isModalAddSertifikat" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalAddSertifikat" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
        @click.away="closeModalAddSertifikat" @keydown.escape="closeModalAddSertifikat"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" @click="closeModalAddSertifikat">
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
                Tambah
            </p>
            <div class="mt-5 md:col-span-2" id="form_regis">
                <form action="{{ route('admin.addSertifikat') }}" id="formAddSertifikat" method="POST"
                    enctype="multipart/form-data">
                    @php
                    $url = explode('/', url()->current());
                    $id_user = end($url);
                    @endphp
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $id_user }}">
                    <div class="sm:rounded-md">
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="kelulusan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <input type="text" name="kelulusan" id="kelulusan" placeholder="Masukan Kelulusan" required oninvalid="this.setCustomValidity('Mohon isi bagian ini')"
                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <label for="upload_file" class="block text-sm font-medium text-gray-700">
                                Upload File
                            </label>
                            <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                <input class="hidden" type="file" name="upload_file" id="upload_file"
                                    oninput="showFileName(this, '#file_name')"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                <input type="text" id="file_name"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                    placeholder="Upload Sertifikat disini, File type: All. Max file size 10 MB" disabled>
                                <span
                                    class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Browse
                                </span>
                            </label>
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


@include('template.admin.modalLogout')

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    new AutoNumeric.multiple('#jumlah_data', {
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: ".",
        currencySymbol: "Rp "
    })

</script>

<script>
    tippy('[data-tippy-content]');

</script>

<script>
    function submit(form) {
        $(`#${form}`).submit();
    }

    function showFileName(param, target) {
        const value = $(param).val();
        const fileName = value.split('\\').pop();
        $(target).val(fileName);
    }

    async function submitFeedback(element) {
        if (event.keyCode == 13) {
            const id = element.getAttribute('data-id');
            const feedback = element.value;
            // alert(feedback);
            if (confirm(
                    'Apakah anda yakin untuk mengirim feedback tersebut ? feedback yang anda tulis akan terkirim pada tenant terkait dan tidak bisa diubah serta dihapus'
                )) {
                const response = await fetch(`{{ route('postFeedback') }}?id=${id}&feedback=${feedback}`)
                    .then((response) => response.json())
                    .then(json => json);
                if (response.success == true) {
                    const container = element.parentElement;
                    container.innerHTML = feedback;
                } else {
                    alert('failed');
                }
            } else {
                return false;
            }
        }
    }

    async function submitFeedbackFileMonev(element) {
        if (event.keyCode == 13) {
            const id = element.getAttribute('data-id');
            const feedback = element.value;
            // alert(feedback);
            if (confirm(
                    'Apakah anda yakin untuk mengirim feedback tersebut ? feedback yang anda tulis akan terkirim pada tenant terkait dan tidak bisa diubah serta dihapus'
                )) {
                const response = await fetch(`{{ route('postFileMonevFeedback') }}?id=${id}&feedback=${feedback}`)
                    .then((response) => response.json())
                    .then(json => json);
                if (response.success == true) {
                    const container = element.parentElement;
                    container.innerHTML = feedback;
                } else {
                    alert('failed');
                }
            } else {
                return false;
            }
        }
    }

</script>

</html>
@endsection

@extends('template.admin.master')

@section('title', 'Dashboard')

@section('body')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('template.admin.sidebar.desktop')
        @include('template.admin.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('template.admin.topbar')
            {{-- Content --}}
            <main class="h-full overflow-y-auto pb-10">
                <div class="container px-6 mx-auto grid">
                    <div class="">

                        <h1 class="font-medium pt-10 pb-4">Profil</h1>
                        <div class="bg-white border border-gray-200" x-data="{selected:null}">
                            <ul class="shadow-box">

                                <li class="relative border-b border-gray-200">

                                    <button type="button" class="w-full px-8 py-6 text-left"
                                        @click="selected !== 1 ? selected = 1 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span>
                                                Profil Usaha</span>
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
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="instagram"
                                                    class="block text-sm font-medium text-gray-700">Instagram</label>
                                                <input type="text" name="instagram" id="instagram"
                                                    placeholder="Masukkan Username Instagram Usaha (Kosongkan Jika Tidak Ada)"
                                                    oninput="checkValue()"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <p class="text-xs italic md ml-2 text-gray-300">
                                                    opsional
                                                </p>
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
                                                    fill="rgba(38,132,199,1)" /></svg>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                        x-ref="container2"
                                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <!-- New Table -->
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                                                <div class="w-full overflow-x-auto">
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3 text-left">No</th>
                                                                <th class="px-4 py-3 text-left">Nama Lengkap</th>
                                                                <th class="px-4 py-3 text-left">Status</th>
                                                                <th class="px-4 py-3 text-left">NRP/NIDN</th>
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
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
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
                                                                    {{ $pro->tanggal }}
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
                                                                    @if($pro->nama_file)
                                                                    <a href="/download?file={{ $pro->id_monev }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $pro->nama_file); $extention = end($get); ?>
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
                                                                    <input type="text"
                                                                    placeholder="Masukan Feedback"
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
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
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
                                                                    {{ $plg->tanggal }}
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
                                                                    @if($plg->nama_file)
                                                                    <a href="/download?file={{ $plg->id_monev }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $plg->nama_file); $extention = end($get); ?>
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
                                                                    <input type="text"
                                                                    placeholder="Masukan Feedback"
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
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
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
                                                                    {{ $data->tanggal }}
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
                                                                    @if($data->nama_file)
                                                                    <a href="/download?file={{ $data->id_monev }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $data->nama_file); $extention = end($get); ?>
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
                                                                    <input type="text"
                                                                    placeholder="Masukan Feedback"
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
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
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
                                                                    {{ $data->tanggal }}
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
                                                                    @if($data->nama_file)
                                                                    <a href="/download?file={{ $data->id_monev }}"
                                                                        target="_blank">
                                                                        <?php $get = explode('.', $data->nama_file); $extention = end($get); ?>
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
                                                                    <input type="text"
                                                                    placeholder="Masukan Feedback"
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
                                            <!-- New Table -->
                                            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
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
                                                                <th class="px-4 py-3 justify-center flex">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            @foreach($finansial as $finan)
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3 text-sm">
                                                                    {{ $finan->tanggal }}
                                                                </td>
                                                                <td class="px-4 py-3 justify-center flex text-sm">
                                                                    <a data-tippy-content="Lihat Bukti"
                                                                        href="/download?file={{ $finan->id_finansial }}">
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
                                                                <td
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

                                        </div>
                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </main>
            {{-- End of Content --}}
        </div>
    </div>
</body>


@include('template.admin.modalLogout')

@endsection

@section('script')
<script>
    tippy('[data-tippy-content]');
</script>

<script>
    async function submitFeedback(element){
        if (event.keyCode == 13) {
            const id = element.getAttribute('data-id');
            const feedback = element.value;
            // alert(feedback);
            const response = await fetch(`{{ route('postFeedback') }}?id=${id}&feedback=${feedback}`)
            .then((response) => response.json())
            .then(json => json);
            
            if (response.success == true) {
                const container = element.parentElement;
                container.innerHTML = feedback;
            } else {
                alert('failed');
            }
        }
    }
</script>

</html>
@endsection

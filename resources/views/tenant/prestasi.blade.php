@extends('template.tenant.master')

@section('title', 'Dashboard')

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
                        Prestasi
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
                            <form action="{{ route('user.prestasiTambah') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                        <div x-data="app()" x-init="[initDate(), getNoOfDays()]"
                                            class="container mx-auto ">
                                            <div class="mb-5 w-full">
                                                <label for="datepicker"
                                                    class="text-sm font-medium text-gray-700">Tanggal</label>
                                                <div class="relative">
                                                    <input type="hidden" name="tanggal" x-ref="date"
                                                        :value="datepickerValue" />
                                                    <input type="text" x-on:click="showDatepicker = !showDatepicker"
                                                        x-model="datepickerValue"
                                                        x-on:keydown.escape="showDatepicker = false"
                                                        class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="Select date" readonly />

                                                    <div class="absolute top-0 right-0 px-3 py-2">
                                                        <svg class="h-6 w-6 text-gray-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>

                                                    <!-- <div x-text="no_of_days.length"></div>
                                                                    <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                                    <div x-text="new Date(year, month).getDay()"></div> -->

                                                    <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                                        style="width: 17rem" x-show.transition="showDatepicker"
                                                        @click.away="showDatepicker = false">
                                                        <div class="flex justify-between items-center mb-2">
                                                            <div>
                                                                <span x-text="MONTH_NAMES[month]"
                                                                    class="text-lg font-bold text-gray-800"></span>
                                                                <span x-text="year"
                                                                    class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                    class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                                    @click="if (month == 0) {
                                                                                            year--;
                                                                                            month = 12;
                                                                                        } month--; getNoOfDays()">
                                                                    <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M15 19l-7-7 7-7" />
                                                                    </svg>
                                                                </button>
                                                                <button type="button"
                                                                    class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                                    @click="if (month == 11) {
                                                                                            month = 0; 
                                                                                            year++;
                                                                                        } else {
                                                                                            month++;
                                                                                        } getNoOfDays()">
                                                                    <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M9 5l7 7-7 7" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-wrap mb-3 -mx-1">
                                                            <template x-for="(day, index) in DAYS" :key="index">
                                                                <div style="width: 14.26%" class="px-0.5">
                                                                    <div x-text="day"
                                                                        class="text-gray-800 font-medium text-center text-xs">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="flex flex-wrap -mx-1">
                                                            <template x-for="blankday in blankdays">
                                                                <div style="width: 14.28%"
                                                                    class="text-center border p-1 border-transparent text-sm">
                                                                </div>
                                                            </template>
                                                            <template x-for="(date, dateIndex) in no_of_days"
                                                                :key="dateIndex">
                                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                                    <div @click="getDateValue(date)" x-text="date"
                                                                        class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                                        :class="{
                                                                    'bg-lightBlue-200': isToday(date) == true, 
                                                                    'text-gray-600 hover:bg-lightBlue-200': isToday(date) == false && isSelectedDate(date) == false,
                                                                    'bg-lightBlue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true
                                                                    }"></div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="jenis_kegiatan"
                                                    class="block text-sm font-medium text-gray-700">Jenis
                                                    Kegiatan</label>
                                                <select id="jenis_kegiatan" name="jenis_kegiatan"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                    <option value="0" disabled selected>Pilih Jenis Kegiatan</option>
                                                    <option value="PWMV">PWMV</option>
                                                    <option value="KIBM">KIBM</option>
                                                    <option value="KBMI">KBMI</option>
                                                    <option value="PKM">PKM</option>
                                                    <option value="Pra Startup">Pra Startup</option>
                                                    <option value="Startup">Startup</option>
                                                    <option value="Scale-up">Scale-up</option>
                                                    <option value="Business Plan">Business Plan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="prestasi"
                                                    class="block text-sm font-medium text-gray-700">Prestasi</label>
                                                <select id="prestasi" name="prestasi"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                    <option value="0" disabled selected>Pilih Prestasi</option>
                                                    <option value="Juara 1">Juara 1</option>
                                                    <option value="Juara 2">Juara 2</option>
                                                    <option value="Juara 3">Juara 3</option>
                                                    <option value="Juara Harapan">Juara Harapan</option>
                                                    <option value="Finalis">Finalis</option>
                                                    <option value="Top 10">Top 10</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="tingkat_prestasi"
                                                    class="block text-sm font-medium text-gray-700">Tingkat
                                                    Prestasi</label>
                                                <select id="tingkat_prestasi" name="tingkat_prestasi"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                    <option value="0" disabled selected>Pilih Tingkat Prestasi</option>
                                                    <option value="Internasional">Internasional</option>
                                                    <option value="Nasional">Nasional</option>
                                                    <option value="Provinsi">Provinsi</option>
                                                    <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                                                    <option value="Regional">Regional</option>
                                                    <option value="Kampus">Kampus</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="upload_file" class="block text-sm font-medium text-gray-700">
                                                Upload File Sertifikat/Dokumentasi
                                            </label>
                                            <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                                <input class="hidden" type="file" name="upload_file" id="upload_file"
                                                    oninput="showFileName(this)"
                                                    accept=".jpg, .jpeg, .png, .pdf"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                                <input type="text" id="file_name"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                                    placeholder="Klik Browse untuk menambahkan file, file type: jpg, jpeg, png, pdf, Max file size 10 mb" disabled>
                                                <span
                                                    class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                    Browse
                                                </span>
                                            </label>
                                        </div>



                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" id="btn-continue"
                                            class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">

                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        History Prestasi
                    </h2>
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg mb-6">
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
                                        <th align="center" class="px-4 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @if(count($prestasi) == 0)
                                    <tr>
                                        <td class="text-center px-4 py-3" colspan="6">
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
                                            <a href="{{ route('download') }}?file={{ $p->file }}" target="_blank">
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
                                        <td align="center" class="px-4 py-3 text-sm">
                                            <button data-tippy-content="Edit" 
                                                class="self-center" 
                                                type="button"
                                                data-prestasi="{{ $p->id_prestasi }}"
                                                onclick="editPrestasi(this)"
                                                @click="openModalPrestasiEdit"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="#FFCC00">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <br>
                                            <a data-tippy-content="Delete" onclick="return confirm('Konfirmasi penghapusan. Apakah anda yakin menghapus data ini?')" href="{{ route('user.deletePrestasi', $p->id_prestasi) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="#FF0000">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
<div x-show="isModalPrestasiEdit" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center overflow-auto">
    <!-- Modal -->
    <div x-show="isModalPrestasiEdit" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
        @keydown.escape="closeModalPrestasiEdit"
        class="w-full px-6 py-4 bg-white rounded-t-lg my-2 dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" @click="closeModalPrestasiEdit">
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
                Edit Data Prestasi
            </p>
            <div class="mt-5 md:col-span-2" id="form_regis">
                <form action="{{ route('user.updatePrestasi') }}" method="POST" id="formEditFileMonev"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="{{ session('login-data')['id'] }}">
                    <input type="hidden" name="id_prestasi" id="id_prestasi">
                    @csrf
                    <div class="sm:rounded-md">
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" class="container mx-auto ">
                                <div class="w-full">
                                    <label for="datepicker" class="text-sm font-medium text-gray-700">Tanggal</label>
                                    <div class="relative">
                                        <input type="hidden" name="tanggal" x-ref="date" :value="datepickerValue" />
                                        <input type="text" x-on:click="showDatepicker = !showDatepicker"
                                            x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false"
                                            class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Select date" readonly />

                                        <div class="absolute top-0 right-0 px-3 py-2">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <!-- <div x-text="no_of_days.length"></div>
                                                    <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                    <div x-text="new Date(year, month).getDay()"></div> -->

                                        <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                            style="width: 17rem" x-show.transition="showDatepicker"
                                            @click.away="showDatepicker = false">
                                            <div class="flex justify-between items-center mb-2">
                                                <div>
                                                    <span x-text="MONTH_NAMES[month]"
                                                        class="text-lg font-bold text-gray-800"></span>
                                                    <span x-text="year"
                                                        class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                        @click="if (month == 0) {
                                                                            year--;
                                                                            month = 12;
                                                                        } month--; getNoOfDays()">
                                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 19l-7-7 7-7" />
                                                        </svg>
                                                    </button>
                                                    <button type="button"
                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                        @click="if (month == 11) {
                                                                            month = 0; 
                                                                            year++;
                                                                        } else {
                                                                            month++; 
                                                                        } getNoOfDays()">
                                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                <template x-for="(day, index) in DAYS" :key="index">
                                                    <div style="width: 14.26%" class="px-0.5">
                                                        <div x-text="day"
                                                            class="text-gray-800 font-medium text-center text-xs">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>

                                            <div class="flex flex-wrap -mx-1">
                                                <template x-for="blankday in blankdays">
                                                    <div style="width: 14.28%"
                                                        class="text-center border p-1 border-transparent text-sm">
                                                    </div>
                                                </template>
                                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                    <div style="width: 14.28%" class="px-1 mb-1">
                                                        <div @click="getDateValue(date)" x-text="date"
                                                            class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                            :class="{
                                                'bg-lightBlue-200': isToday(date) == true, 
                                                'text-gray-600 hover:bg-lightBlue-200': isToday(date) == false && isSelectedDate(date) == false,
                                                'bg-lightBlue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                }"></div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="jenis_kegiatan" class="block text-sm font-medium text-gray-700">Jenis
                                    Kegiatan</label>
                                <select id="jenis_kegiatan_update" name="jenis_kegiatan"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                    <option value="" disabled selected>Pilih Jenis Kegiatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="prestasi" class="block text-sm font-medium text-gray-700">Prestasi</label>
                                <select id="prestasi_update" name="prestasi"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                    <option value="" disabled selected>Pilih Prestasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tingkat_prestasi" class="block text-sm font-medium text-gray-700">Tingkat Prestasi</label>
                                <select id="tingkat_prestasi_update" name="tingkat_prestasi"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                    <option value="" disabled selected>Pilih Tingkat Prestasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <label for="upload_file" class="block text-sm font-medium text-gray-700">
                                Ubah File
                            </label>
                            <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                <input class="hidden" type="file" name="upload_file" id="upload_file"
                                    oninput="showFileName(this, '#file_name_update')"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                <input type="text" id="file_name_update"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                    placeholder="Upload Bukti Transaksi disini" disabled>
                                <span
                                    class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Browse
                                </span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer
            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button type="button" id="btn_submit" onclick="submit('formEditFileMonev')"
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
<script src="{{ asset('') }}js/date-picker.js"></script>
<script>
    function submit(form){
        $(`#${form}`).submit();
    }

    function showFileName(param) {
        const value = $(param).val();
        const fileName = value.split('\\').pop();
        $('#file_name').val(fileName);
        console.log(value);
    }

    async function editPrestasi(element){
        const id_prestasi = $(element).data('prestasi');
        console.log(id_prestasi);
        const prestasi = await fetch(`{{ route('getPrestasi') }}/${id_prestasi}`)
        .then(res => res.json())
        .then(result => result);
        console.log(prestasi);
        const JENIS_KEGIATAN = [
            'KIBM',
            'KBMI',
            'PKM',
            'Business Plan',
            'Lainnya'
        ];
        const PRESTASI = [
            'Juara 1',
            'Juara 2',
            'Juara 3',
            'Juara Harapan',
            'Finalisi',
            'Top 10',
            'Lainnya'
        ];
        const TINGKAT_PRESTASI = [
            'International',
            'Nasional',
            'Provinsi',
            'Kota/Kabupaten',
            'Regional',
            'Kampus'
        ];
        let kegiatan = '';
        let pres = '';
        let tingkat_prestasi = '';
        JENIS_KEGIATAN.forEach((item, index) => {
            kegiatan += `<option value="${item}" ${ item == prestasi.jenis_kegiatan ? 'selected' : '' }>${item}</option>`;
        });
        PRESTASI.forEach((item, index) => {
            pres += `<option value="${item}" ${ item == prestasi.prestasi ? 'selected' : '' }>${item}</option>`;
        })
        TINGKAT_PRESTASI.forEach((item, index) => {
            tingkat_prestasi += `<option value="${item}" ${ item == prestasi.tingkat_prestasi ? 'selected' : '' }>${item}</option>`;
        })
        $('#id_prestasi').val(id_prestasi);
        $('#jenis_kegiatan_update').html(kegiatan)
        $('#prestasi_update').html(pres)
        $('#tingkat_prestasi_update').html(tingkat_prestasi)
        $('#file_name_update').val(prestasi.has_file.nama_file ?? null);
    }

</script>
<script>
    tippy('[data-tippy-content]');

</script>

</html>
@endsection
